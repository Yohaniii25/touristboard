<?php
header('Content-Type: application/json');

session_start();

class LoginController
{
    private $con;

    public function __construct()
    {
        // Include the correct path to dbconfig.php
        $this->con = include_once(__DIR__ . '/../../includes/dbconfig.php');
        if (!$this->con || $this->con->connect_errno) {
            die("Failed to connect to MySQL: " . ($this->con->connect_error ?? 'Unknown error'));
        }
    }

    public function userLogin($request)
    {
        error_log("userLogin function called");

        // Get the username and password from the request
        $username = trim($request['username']);
        $user_password = $request['password'];

        if (!empty($username) && !empty($user_password)) {
            $stmt = $this->con->prepare("SELECT id, username, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Use password_verify to check hashed password
                if (password_verify($user_password, $row['password'])) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION['log_session'] = [
                        'admin_id' => $row['id'],
                        'admin_username' => $row['username'],
                    ];

                    $data = [
                        'admin_id' => $row['id'],
                        'message' => 'Login Success!'
                    ];
                    echo json_encode(['status' => 1, 'data' => $data]);
                    exit();
                } else {
                    echo json_encode(['status' => 0, 'message' => 'Incorrect Password!']);
                    exit();
                }
            } else {
                echo json_encode(['status' => 0, 'message' => 'Incorrect Username!']);
                exit();
            }
        } else {
            echo json_encode(['status' => 0, 'message' => 'Both Username and Password are required!']);
            exit();
        }
    }
}

if (isset($_POST['USER_LOGIN'])) {
    $lc = new LoginController();
    $lc->userLogin($_POST);
}
