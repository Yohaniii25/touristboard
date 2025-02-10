<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
        display: flex;
        justify-content: center; 
        align-items: center;
    }

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

    .popup {
        position: relative; 
        border: 1px solid #afaaaa;
        background-color: #fff;
        border-radius: 30px;
        overflow: hidden;
        text-align: center;
        max-width: 100%; 
        max-height: 100%; 
        display: flex;
        flex-direction: column;
    }

    .popup img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

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
            <a target="_blank" href="#">
                <img src='images/MaharaVesakBanner-02.png' alt="Test Image">
            </a>


            
        </div>
    </div>


    <script>
    function openPopup() {
        document.getElementById('overlay').style.display = 'flex';
        
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