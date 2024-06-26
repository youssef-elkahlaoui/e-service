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
                        Auth::authNiveau();
                        if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
                            setcookie('remembered', 'true', [
                                'expires' => time() + (86400 * 30),
                                'path' => '/',
                                'domain' => null,
                                'secure' => true,
                                'httponly' => true,
                                'samesite' => 'Lax'
                            ]);
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
                            setcookie('remembered', 'true', [
                                'expires' => time() + (86400 * 30),
                                'path' => '/',
                                'domain' => null,
                                'secure' => true,
                                'httponly' => true,
                                'samesite' => 'Lax'
                            ]);                        }
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
                            setcookie('remembered', 'true', [
                                'expires' => time() + (86400 * 30),
                                'path' => '/',
                                'domain' => null,
                                'secure' => true,
                                'httponly' => true,
                                'samesite' => 'Lax'
                            ]);                        }
                        $this->incrementLoginCount();
                        $this->redirect('/admins');
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
        $pdo = $cnx->connect();
        $today = date('Y-m-d');
        $stmt = $pdo->prepare("SELECT * FROM logins WHERE date = :date");
        $stmt->execute(['date' => $today]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $stmt = $pdo->prepare("UPDATE logins SET count = count + 1 WHERE date = :date");
            $stmt->execute(['date' => $today]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO logins (date, count) VALUES (:date, 1)");
            $stmt->execute(['date' => $today]);
        }
    }

    public function getLastSevenDaysData()
    {
        $cnx = new Database();
        $sevenDaysAgo = date('Y-m-d', strtotime('-6 days'));
        $query = 'SELECT date, count FROM logins WHERE date >= :sevenDaysAgo ORDER BY date';
        
        $results = $cnx->query($query, ['sevenDaysAgo' => $sevenDaysAgo], "assoc");
    
        if ($results === false) {
            return json_encode(['error' => 'Failed to fetch data']);
        }
    
        $data = [];
        $currentDate = new DateTime($sevenDaysAgo);
    
        for ($i = 0; $i < 7; $i++) {
            $data[$currentDate->format('Y-m-d')] = 0;
            $currentDate->modify('+1 day');
        }
    
        foreach ($results as $result) {
            $data[$result['date']] = $result['count'];
        }
    
        return json_encode(array_values($data));
    }
    
    public function getSumOfLoginsLastSevenDays()
    {
    $cnx = new Database();
    $sevenDaysAgo = date('Y-m-d', strtotime('-6 days'));
    $query = 'SELECT SUM(count) AS total_logins FROM logins WHERE date >= :sevenDaysAgo';
    $result = $cnx->query($query, ['sevenDaysAgo' => $sevenDaysAgo], "assoc");
    
    if ($result && isset($result[0]['total_logins'])) {
        return $result[0]['total_logins'];
    }
    
    return 0;
    }

}
?>