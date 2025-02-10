<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Styling for the overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 70%;
            right: 10px;
            transform: translateY(-50%);
            align-items: center;
            z-index: 1;
            animation: slideFromRight 1s ease forwards;
        }

        /* Keyframe animation */
        @keyframes slideFromRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0%);
            }
        }

        /* Styling for the popup */
        .popup {
            border: 1px solid #afaaaa;
            background-color: #fff;
            border-radius: 30px;
            overflow: hidden;
            text-align: center;
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .popup img {
            width: auto;
            height: auto;
            max-width: 20vw;
            max-height: 15vh;
            object-fit: contain;
            margin-right: 20px;
           
        }

        .popup-text {
            flex: 1;
            text-align: left;
           
        }


        /* Close button styling */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Responsive aspect ratio for the pop-up */
        @media (min-width: 600px) {
            .popup {
                max-width: 40vw;
                max-height: 60vh;
                
            }
        }
    </style>
</head>

<body>
    <div class="overlay" id="overlay" onclick="closePopup()">
        <div class="popup" onclick="event.stopPropagation()">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <a target="_blank" href="https://www.mobitel.lk/one-shot-ultra">
                <img src='images/new-mobitel-ad-min.png' alt="Test Image">
            </a>
            <div class="popup-text">
                <h3 style="font-size: 20px !important;">This is a sample advertisement placeholder</h3>
            </div>

            
        </div>
    </div>


    <script>
    function openPopup() {
        document.getElementById('overlay').style.display = 'flex';
        setTimeout(closePopup, 8000); // Close the popup after 8 seconds (8000 milliseconds)
    }

    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
    }
    window.onload = function() {
        openPopup();
    };
</script>

</body>

</html>