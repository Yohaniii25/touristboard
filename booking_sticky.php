<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Sticky Book Now Button</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->

    <style>
        .sticky-button {
            position: fixed;
            left: 0;               
            top: 30%;  /* Positioning the first button a bit higher */
            transform: translateY(-50%);  
            background-color: red;
            color: white;
            border: none;
            padding: 20px 10px;    
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 50px;          
            height: 160px;        
            text-align: center;
            writing-mode: vertical-rl;   
            transform: rotate(180deg);   
        }

        .sticky-button:hover {
            background-color: darkred;
        }

        /* New Book Tickets button */
        .sticky-button-black {
            position: fixed;
            left: 0;
            top: 60%;  /* Positioning the second button below the first one */
            transform: translateY(-50%);
            background-color: black;
            color: white;
            border: none;
            padding: 20px 10px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 50px;
            height: 180px;
            text-align: center;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        .sticky-button-black:hover {
            background-color: #333;
        }

        /* Content styles */
        .content {
            margin-left: 70px; /* Prevent overlap with the sticky button */
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Sticky vertical "Book Now" button -->
    <a href="tours.php" class="sticky-button">Book Hotels</a>

    <!-- Sticky vertical "Book Tickets" button -->
    <a href="tickets.php" class="sticky-button-black">Book Tickets</a>

</body>
</html>
