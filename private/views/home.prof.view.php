<?php 
    include "includes/nav.prof.view.php";
    include "includes/header.view.php";
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    div{
        font-family: 'Poppins', sans-serif;

    }
    .wrapper{
        margin: -50px 0 50px;
    }
</style>
<body>
  <div class="main-content wrapper">
    <div class="header bg-gradient-danger  pb-8 pt-md-8">
      <div class="container-fluid">
        <h2 class="mb-5 text-white">Stats Card</h2>
        <div class="header-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body ">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">897</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New notifications</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">356</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Documents</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">924</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since last year</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Logins</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">49,65%</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
        </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="row">
  <div class="col-md-9">
    <div class="card" style="height: 500px;">
      <canvas id="myChart" class="m-5" style="width: calc(100% - 10px); height: calc(100% - 10px);"></canvas>
    </div>
  </div>
  <div class="col-md-3">
  <div class="card" style="height: 500px;">
    <div class="card-body">
      <h5 class="card-title">Latest News</h5>
      <div class="news-item">
        <h6 class="news-label" style="background-color: #d7ecfb; padding: 5px;">News 1</h6>
        <h6 class="news-title">Lorem Ipsum Dolor Sit Amet</h6>
        <p class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="btn btn-outline-primary btn-sm" style="color: blue;">Read More</button>
      </div>
      <hr>
      <div class="news-item">
        <h6 class="news-label" style="background-color: #d7ecfb; padding: 5px;">News 2</h6>
        <h6 class="news-title">Consectetur Adipiscing Elit</h6>
        <p class="news-content">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button class="btn btn-outline-primary btn-sm" style="color: blue;">Read More</button>
      </div>
      <hr>
    </div>
  </div>
</div>

</div>
>

</body>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myChart').getContext('2d');
            
            // Parse the JSON data from PHP
            const weeklyData = <?php echo $last4WeeklyCounts; ?>;

            const labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
            const data = weeklyData;

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of Logins per Week',
                        data: data,
                        borderWidth: 4,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
                        tension: 0.5,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true
                        },
                        animation: {
                            duration: 2000, // 2 seconds
                            easing: 'easeInOutQuart' // smooth animation
                        }
                    }
                }
            });
        });
    </script>

<script src="https://unpkg.com/bs-brain@2.0.4/components/charts/chart-1/assets/controller/chart-1.js"></script>
