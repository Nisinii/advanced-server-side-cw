<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            line-height: 1.7;
            color: #ffeba7;
            background-color: #1f2029;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            font-weight: 500;
            color: #ffeba7;
            margin-bottom: 30px;
            text-align: center;
        }

        .card {
            background-color: #2b2e38;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 450px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #c4c3ca;
        }

        input {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 6px;
            background-color: #1f2029;
            color: #c4c3ca;
            font-size: 14px;
            margin-bottom: 7px;
        }

        input[type="submit"] {
            border-radius: 4px;
            height: 44px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            -webkit-transition : all 200ms linear;
            transition: all 200ms linear;
            padding: 0 30px;
            letter-spacing: 1px;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            align-items: center;
            background-color: #ffeba7;
            color: #000000;
            width: 150px; 
            display: block;
            margin: 0 auto;
            margin-top: 15px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

		input[type="submit"]:hover { 
            background-color: #17181e;
            color: #ffeba7;
            box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
		}

        p {
            font-weight: 500;
            font-size: 14px;
            color: #c4c3ca;
            margin-top: 20px;
            text-align: center;
        }

        a {
            color: #ffeba7;
            text-decoration: none;
        }

        a:hover {
            color: #c4c3ca;
        }

        .form-group{ 
		    position: relative;
		    display: block;
		    margin: 0;
			padding: 0;
		}

		.form-style {
            padding: 13px 20px;
            padding-left: 55px;
            height: 48px;
            width: 100%;
            font-weight: 500;
            border-radius: 4px;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0.5px;
            outline: none;
            color: #c4c3ca;
            background-color: #1f2029;
            border: none;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
            box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
		}

		.form-style:focus,
		.form-style:active {
            border: none;
            outline: none;
            box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
		}

        .input-icon {
            position: absolute;
            top: 20%;
            left: 10px; 
            transform: translateY(-50%);
            height: 24px;
            font-size: 24px;
            transition: all 200ms linear;
        }

    </style>
</head>
<body>
    <div class="card">
        <h2>User Registration</h2>
        <?php echo validation_errors(); ?>
        <?php echo form_open('auth/register'); ?>
            <div class="form-group">
                <input type="text" class="form-style" name="username" placeholder="Username" required>
                <i class="input-icon uil uil-user"></i>
            </div>
            <div class="input-group">
                <input type="password" class="form-style" name="password" placeholder="Password" required>
                <i class="input-icon uil uil-lock-alt"></i>
            </div>
            <div class="input-group">
                <input type="email" class="form-style" name="email" placeholder="Email" required>
                <i class="input-icon uil uil-at"></i>
            </div>
            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <?php echo anchor('auth/login', 'Login here'); ?></p>
    </div>
</body>
</html>
