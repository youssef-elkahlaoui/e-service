<?php
class Login extends Controller
{
  function index()
  {
      $errors = array();
      Auth::logout();

      if (count($_POST) > 0) {
          $patternEtu = '/^[a-z]+\.[a-z]+@etu\.com$/i';
          $patternTeach = '/^[a-z]+\.[a-z]+@prof\.com$/i';
          $patternAdmin = '/^[a-z]+\.[a-z]+@admin\.com$/i';
          $EMAIL = $_POST['email'];

          if (preg_match($patternEtu, $EMAIL)) {
              $user = new Student();
              if ($row = $user->where('email', $EMAIL)) {
                  $row = $row[0];
                  if (password_verify($_POST['password'], $row->password)) {
                      Auth::authenticateStudent($row);
                      if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
                          setcookie('remembered', 'true', time() + (86400 * 30), '/');
                      }
                      $this->incrementLoginCount();
                      $this->redirect('/student');
                  }
              }
          } elseif (preg_match($patternTeach, $EMAIL)) {
              $user = new Teacher();
              if ($row = $user->where('email', $EMAIL)) {
                  $row = $row[0];
                  if (password_verify($_POST['password'], $row->password)) {
                      Auth::authenticateTeacher($row);
                      if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
                          setcookie('remembered', 'true', time() + (86400 * 30), '/');
                      }
                      $this->incrementLoginCount();
                      $this->redirect('/teachers');
                  }
              }
          } elseif (preg_match($patternAdmin, $EMAIL)) {
              $user = new Admin();
              if ($row = $user->where('email', $EMAIL)) {
                  $row = $row[0];
                  if (password_verify($_POST['password'], $row->password)) {
                      Auth::authenticateAdmin($row);
                      if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
                          setcookie('remembered', 'true', time() + (86400 * 30), '/');
                      }
                      $this->incrementLoginCount();
                      $this->redirect('/admin');
                  }
              }
          }
          $errors['email'] = "Wrong email or password";
      }
      $this->view('login', [
          'errors' => $errors,
      ]);
  }

  private function incrementLoginCount()
  {
      $cnx = new Database();
      $pdo=$cnx->connect();
      $today = date('Y-m-d');
      $stmt = $pdo->prepare("SELECT * FROM logins WHERE date = :date");
      $stmt->execute(['date' => $today]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
      if ($result) {
          // Increment today's login count
          $stmt = $pdo->prepare("UPDATE logins SET count = count + 1 WHERE date = :date");
          $stmt->execute(['date' => $today]);
      } else {
          // Insert a new record for today
          $stmt = $pdo->prepare("INSERT INTO logins (date, count, weekly_counts) VALUES (:date, 1, :weekly_counts)");
          $initialWeeklyCounts = json_encode(array_fill(0, 365, 0));
          $stmt->execute(['date' => $today, 'weekly_counts' => $initialWeeklyCounts]);
      }

      // Update the weekly_counts array
      $this->updateWeeklyCounts($pdo, $today);
  }

  private function updateWeeklyCounts($pdo, $today)
  {
      // Get all login records
      $stmt = $pdo->prepare("SELECT * FROM logins");
      $stmt->execute();
      $allRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $weeklyCounts = array_fill(0, 365, 0);
      foreach ($allRecords as $record) {
          $date = new DateTime($record['date']);
          $daysAgo = $date->diff(new DateTime($today))->days;

          if ($daysAgo < 365) {
              $weeklyCounts[$daysAgo] = $record['count'];
          }
      }

      // Convert weeklyCounts to JSON
      $weeklyCountsJson = json_encode(array_reverse($weeklyCounts));

      // Update today's record with the new weekly_counts array
      $stmt = $pdo->prepare("UPDATE logins SET weekly_counts = :weekly_counts WHERE date = :date");
      $stmt->execute(['weekly_counts' => $weeklyCountsJson, 'date' => $today]);
  }
  function getChartData()
  {
    $cnx = new Database();
    $pdo=$cnx->connect();
    $today = date('Y-m-d');

      // Get today's record
      $stmt = $pdo->prepare("SELECT weekly_counts FROM logins ORDER BY date DESC LIMIT 1");
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$result || !isset($result['weekly_counts'])) {
          // Return an empty array if there's no data
          return json_encode([]);
      }

      $weeklyCounts = json_decode($result['weekly_counts'], true);

      if (!is_array($weeklyCounts)) {
          // Return an empty array if the JSON is not decoded correctly
          return json_encode([]);
      }

      // Get the last 4 weekly values
      $last4WeeklyCounts = array_slice($weeklyCounts, -4);

      return json_encode($last4WeeklyCounts);
  }
}

// In your HTML view:
$loginController = new Login();
$last4WeeklyCounts = $loginController->getChartData();
?>