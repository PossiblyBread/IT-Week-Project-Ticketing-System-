<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"> -->
</head>

<body>

    <section id="header">
        <div class="header">
            <div class="nav-bar">
                <div class="logo">
                    <a href=>STI Website</a>
                </div>
            </div>
    </section>
    <section>

        <nav>
            <img src="img/student.png" alt="Avatar" class="avatar">
            <ul>
                <li><button><a href="">Class Schedules</a></button></li>
                <li><button><a href="">Activities</a></button></li>
                <li><button><a href="">Program Curiculum</a></button></li>
                <li><button><a href="">Balances</a></button></li>
                <li><button><a href="">History</a></button></li>
                <li><button><a href="">Mission & Vision</a></button></li>
                <li><button><a href="">Feedback</a></button></li>
                <li><button><a href="">About</a></button></li>
                <li><button><a href="logout.php">Logout</a></button></li>
            </ul>
            <a href="faq_s.php" class="question">FaQ's</a>
        </nav>
        <div class="_container">
            <div class="box-container">
                <img src="img/document.png" alt="Avatar" class="icon">
                <div class="box-text">Documents</div>
            </div>
            <div class="box-container">
                <img src="img/savefiles.png" alt="Avatar" class="icon">
                <div class="box-text">Save Files</div>
            </div>
            <div class="box-container">
                <img src="img/notes.png" alt="Avatar" class="icon">
                <div class="box-text">Notes</div>
            </div>
        </div>
        </div>
        </div>
        <!-- <video class="_videos" loop autoplay muted>
            <source class="_video2" src="videos/videoplayback.mp4">
        </video> -->
        <h1>
            Be One of Us! Be an STI'ers
        </h1>
    </section>
    <a href="#" onclick="openForm()">
        <img src="img/message.png" alt="Avatar" class="help">
    </a>
    <div class="form-popup" id="myForm">
        <img src="img/bot.png" alt="Avatar" class="iconform">
        <button class="open-button" onclick="toggleHelp()">
            <img src="img/supportticket.png" alt="Status">
        </button>


        <form class="form-container" onsubmit="submitForm(event)">
            <div class="chat-container" id="chatContainer">
                <!-- Chat messages will appear here -->
            </div>

            <input type="text" placeholder="Type a message..." id="userInput" required>
            <button type="button" class="btn cancel" onclick="closeForm()">
                <img src="img/close.png" alt="Close">
            </button>
            <button type="submit" class="btns send">
                <img src="img/mail.png" alt="Send">
            </button>
            <div class="form-popups" id="helpPopup">

                <div class="form-containers">
                    <div class="help-item-no-click">Send Ticket</div>
                    <div class="help-items" onclick="showHelpItem('Password Reset')">Password Reset</div>
                    <div class="help-items" onclick="showHelpItem('Technical Support')">Technical Support</div>
                    <div class="help-items" onclick="showHelpItem('Mental Health Support')">Mental Health Support</div>
                    <div class="help-items" onclick="showHelpItem('Bullying Concerns')">Bullying Concerns</div>
                    <div class="help-itema" onclick="showHelpItem('Ticket Status')">Ticket Status</div>
                    <button type="button" class="btn back" onclick="closeHelp()">
                        <img src="img/back.png" alt="Back">
                    </button>
                </div>
            </div>
            <div class="form-container" id="myForm" style="display: none;">
                <form id="myFormElement" onsubmit="submitForm(event)">
                    <input type="hidden" id="userInput" name="userInput">
                </form>
            </div>

            <script>
                function showHelpItem(item) {
                    document.getElementById("userInput").value = item;
                    closeHelp();
                    openForm();
                }

                function toggleHelp() {
                    const helpPopup = document.getElementById("helpPopup");
                    helpPopup.style.display = (helpPopup.style.display === "block") ? "none" : "block";
                }

                function closeHelp() {
                    document.getElementById("helpPopup").style.display = "none";
                }

                function openForm() {
                    document.getElementById("myForm").style.display = "block";
                }

                function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                    clearChatHistory();
                }

                function clearChatHistory() {
                    const chatContainer = document.getElementById("chatContainer");
                    chatContainer.innerHTML = "";
                }


                function submitForm(event) {
                    event.preventDefault();
                    const form = document.getElementById("myFormElement");
                    const formData = new FormData(form);

                    form.reset();
                    closeForm();
                }

                function showHelpItem(item) {
                    document.getElementById("userInput").value = item;
                    closeHelp();
                    submitForm(event);
                }

                function submitForm(event) {
                    event.preventDefault();
                    const userInput = document.getElementById("userInput").value;
                    const chatContainer = document.getElementById("chatContainer");
                    var messageInput = document.getElementById('userInput');
                    if (messageInput.value.trim() !== '') {
                        setTimeout(function() {
                            messageInput.value = '';
                            chatContainer.scrollTop = chatContainer.scrollHeight;
                        }, 1);
                    }
                    //Display user 's message in chat
                    displayMessage(userInput, true);

                    //Simulate interaction with AI(replace this with actual API calls)
                    simulateAIResponse(userInput);
                }

                function displayMessage(message, isUser) {
                    const chatContainer = document.getElementById("chatContainer");
                    const messageElement = document.createElement("div");
                    messageElement.classList.add("message");
                    if (isUser) {
                        messageElement.classList.add("user-message");
                    } else {
                        messageElement.classList.add("ai-message");
                    }

                    messageElement.innerHTML = message;
                    chatContainer.appendChild(messageElement);
                    chatContainer.scrollTop = chatContainer.scrollHeight;

                }

                function simulateAIResponse(userInput) {
                    setTimeout(() => {
                        fetch('responses.json')
                            .then(response => response.json())
                            .then(data => {
                                let aiResponse;

                                const lowerCaseInput = userInput.toLowerCase();

                                if (lowerCaseInput.includes("hello") || lowerCaseInput.includes("hi") || lowerCaseInput.includes("hey")) {
                                    aiResponse = getRandomResponse(data.greetings);

                                } else if (lowerCaseInput.includes("grade") || lowerCaseInput.includes("mark") || lowerCaseInput.includes("exam")) {
                                    aiResponse = getRandomResponse(data.gradeProblems);
                                } else if (lowerCaseInput.includes("ticket status")) {
                                    aiResponse = getRandomResponse(data.passStatus);
                                } else if (lowerCaseInput.includes("password") || lowerCaseInput.includes("change password")) {
                                    aiResponse = getRandomResponse(data.passwordChange);
                                } else if (lowerCaseInput.includes("tech") || lowerCaseInput.includes("technical")) {
                                    aiResponse = getRandomResponse(data.techSupport);
                                } else if (lowerCaseInput.includes("assignment") || lowerCaseInput.includes("missing")) {
                                    aiResponse = getRandomResponse(data.missingAssignment);
                                } else if (lowerCaseInput.includes("schedule")) {
                                    aiResponse = getRandomResponse(data.scheduleQuery);
                                } else if (lowerCaseInput.includes("library")) {
                                    aiResponse = getRandomResponse(data.libraryAccess);
                                } else if (lowerCaseInput.includes("extracurricular") || lowerCaseInput.includes("activities")) {
                                    aiResponse = getRandomResponse(data.extracurricularActivities);
                                } else if (lowerCaseInput.includes("college") || lowerCaseInput.includes("applications")) {
                                    aiResponse = getRandomResponse(data.collegeApplications);
                                } else if (lowerCaseInput.includes("homework") || lowerCaseInput.includes("study")) {
                                    aiResponse = getRandomResponse(data.homeworkHelp);
                                } else if (lowerCaseInput.includes("study tips")) {
                                    aiResponse = getRandomResponse(data.studyTips);
                                } else if (lowerCaseInput.includes("test") || lowerCaseInput.includes("preparation")) {
                                    aiResponse = getRandomResponse(data.testPreparation);
                                } else if (lowerCaseInput.includes("bully") || lowerCaseInput.includes("bullying")) {
                                    aiResponse = getRandomResponse(data.bullyingConcerns);
                                } else if (lowerCaseInput.includes("career")) {
                                    aiResponse = getRandomResponse(data.careerAdvice);
                                } else if (lowerCaseInput.includes("event") || lowerCaseInput.includes("events")) {
                                    aiResponse = getRandomResponse(data.schoolEvents);
                                } else if (lowerCaseInput.includes("rule") || lowerCaseInput.includes("rules")) {
                                    aiResponse = getRandomResponse(data.schoolRules);
                                } else if (lowerCaseInput.includes("parent") || lowerCaseInput.includes("parents")) {
                                    aiResponse = getRandomResponse(data.parentInvolvement);
                                } else if (lowerCaseInput.includes("mental") || lowerCaseInput.includes("health")) {
                                    aiResponse = getRandomResponse(data.mentalHealthSupport);
                                } else if (lowerCaseInput.includes("conflict") || lowerCaseInput.includes("resolution")) {
                                    aiResponse = getRandomResponse(data.peerConflictResolution);
                                } else if (lowerCaseInput.includes("teacher") || lowerCaseInput.includes("meeting")) {
                                    aiResponse = getRandomResponse(data.teacherMeeting);
                                } else if (lowerCaseInput.includes("graduation")) {
                                    aiResponse = getRandomResponse(data.graduationRequirements);
                                } else if (lowerCaseInput.includes("yes")) {
                                    aiResponse = getRandomResponse(data.yes);
                                } else if (lowerCaseInput.includes("no") || lowerCaseInput.includes("No")) {
                                    aiResponse = getRandomResponse(data.noResponse);
                                } else if (/\d/.test(lowerCaseInput)) {
                                    aiResponse = getRandomResponse(data.ticketNumber);
                                }

                                // Add more conditions based on specific keywords and their associated responses
                                // If no specific condition matches, provide a general response

                                if (!aiResponse) {
                                    aiResponse = getRandomResponse(data.generalHelp);
                                }

                                displayMessage(aiResponse, false);


                            })
                            .catch(error => {
                                console.error('Error fetching or parsing JSON:', error);
                            });
                    }, 1000);
                }

                function getRandomResponse(responsesArray) {
                    return responsesArray[Math.floor(Math.random() * responsesArray.length)];
                }
            </script>
</body>
<style>
    body {
        font-family: "Karla", sans-serif;
        min-height: 100vh;
        /* background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/userSD.jpg'); */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background: (rgb(255, 255, 255));
    }

    h1 {
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        color: #ADD8E6;
        position: absolute;
        text-align: center;
        bottom: 85%;
        left: 69%;
    }

    ._videos {
        width: 150%;
        max-width: 500px;
        height: auto;
        position: absolute;
        top: 535px;
        left: 200px;
        border-radius: 5px;
    }

    body::after {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: lightskyblue;
        opacity: .7;
        z-index: -1;
    }

    :root {
        --gap-size: 10px;
        --padding-size: 200px;
    }

    ._container {
        width: 100%;
        height: 100vh;
        /* background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(images/imgmain.jpg); */
        background-position: center;
        background-size: cover;
        padding-left: 8%;
        padding-right: 8%;
        box-sizing: border-box;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: var(--gap-size);
        padding: var(--padding-size);
    }

    .box-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;

    }

    .box-text {
        margin-top: 10px;
    }

    .icon {
        width: 200px;
        height: auto;
    }

    .btns.send {
        border: none;
        padding: 0;
        background: none;
        cursor: pointer;
        position: relative;
        top: -5px;
        left: 250px;
    }

    .btns.send img {
        width: 30px;
        height: 30px;
    }

    .btn.cancel {
        border: none;
        padding: 0;
        background: none;
        cursor: pointer;
        position: relative;
        top: -380px;
        margin-left: 250px;
    }

    .btn.cancel img {
        width: 30px;
        height: 30px;
    }

    .open-button {
        border: none;
        padding: 0;
        background: none;
        cursor: pointer;
        position: relative;
        top: 400px;
        right: 60px;
    }

    .open-button img {
        width: 70px;
        height: 70px;
    }

    .btn.back {
        border: none;
        padding: 0;
        background: none;
        cursor: pointer;
        position: relative;
        margin-top: -100px;
        left: 230px;
    }

    .btn.back img {
        width: 40px;
        height: 40px;
    }

    .iconform {
        width: 50px;
        height: auto;
        position: relative;
        margin-left: 10px;
    }

    /* Style the header */
    #header {
        background: dodgerblue;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 7%;
    }

    #header .header {
        transition: .3s ease background-color;
    }

    #header .nav-bar {
        margin: 0 2%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        height: 100%;
        max-width: 1200px;
        padding: 0 10px;
    }

    #header .logo a {
        font-family: Georgia, 'Times New Roman', Times, serif, Bold;
        font-size: 35px;
        text-decoration: none;
        color: black;
        border: 2px;
        padding: 2px;
    }

    #header .logo:hover a {
        text-decoration: none;
        background: rgb(107, 172, 246);
        color: white;
    }

    @media only screen and (min-width: 768px) {
        #hero h1 {
            font-size: 7rem;
        }
    }

    @media only screen and (min-width: 1200px) {

        /* header */
        #header .hamburger {
            display: none;
        }
    }

    .avatar {
        display: block;
        width: 130px;
        height: 130px;
        margin-left: auto;
        margin-right: auto;
        border: 10px;
        padding: 10px;
        border-radius: 50%;
    }

    p {
        font-size: 15px;
        text-align: center;
    }

    nav {
        margin-top: 52px;
        position: fixed;
        float: right;
        width: 10%;
        height: 100%;
        /* background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); */
        background: lightblue;
        padding: 30px 0px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    ul li {
        display: block;
        margin-bottom: 5px;
    }

    ul li button {
        display: block;
        text-decoration: none;
        padding: 10px 15px;
        width: 140px;
        height: 58px;
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        color: black;
        text-align: center;
        cursor: pointer;
        border-bottom: 3px solid blue;
        background-color: white;
        border-radius: 8px;
    }

    ul li button a {
        text-decoration: none;
        color: inherit;
    }

    ul li button a:focus,
    ul li button a:hover {
        text-decoration: none;
    }

    /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
    @media (max-width: 600px) {
        nav {
            width: 100%;
            height: auto;
        }
    }

    .question {
        font-size: medium;
        position: fixed;
        bottom: 2%;
        width: 5%;
        text-align: center;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .help {
        width: 100px;
        height: auto;
        position: absolute;
        top: 720px;
        left: 90%;
    }

    /* The popup form - hidden by default */
    .form-popups {
        width: 300px;
        height: 370px;
        border: 2px solid #ccc;
        position: absolute;
        top: 80px;
        left: -250px;
        overflow: auto;
        background-color: #f9f9f9;
        padding: 5px;
    }

    /* Full-width input fields */
    .form-container input,
    .form-container input {
        width: 100%;
        padding: 5px;
        margin: 205px 0 20px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input:focus,
    .form-container input:focus {

        background-color: #ddd;
        outline: none;
    }

    #userInput {
        width: 290px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        position: relative;
        top: 75px;
        right: 2%;
    }

    /* Styles for chat window and messages */
    .form-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 2px solid #ccc;
        z-index: 9;
        max-width: 300px;
        background-color: mediumturquoise;
    }

    .form-container {
        max-width: 100%;
        padding: 10px;
        border-radius: 2%;
        background-color: navajowhite;
    }

    .chat-container {
        position: fixed;
        max-height: 270px;
        overflow-y: auto;
    }

    .message {
        max-width: 260px;
        padding: 5px;
        margin: 5px;
        border-radius: 50px;
    }

    .user-message {
        background-color: #DCF8C6;
        text-align: right;
    }

    .ai-message {
        background-color: #F0F0F0;
        text-align: left;
    }

    .btn {
        padding: 10px 0px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
        margin-top: 50px;
    }

    .help-item-no-click {
        padding: 8px 12px;
        margin: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, Bold;
        font-variant: small-caps;
        color: #333;
        border-radius: 4px;
        text-align: center;
    }

    .help-items {
        padding: 10px;
        margin: 5px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-bottom: 3px solid blue;
    }

    .help-items:hover {
        background-color: #e0e0e0;
    }

    .help-items:active {
        background-color: #d0d0d0;
    }

    .help-itema {
        width: 70px;
        height: 80px;
        padding: 10px;
        margin: 5px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-bottom: 3px solid red;
        border-top: 3px solid red;
        border-left: 3px solid red;
        border-right: 3px solid red;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, Bold;
        font-variant: small-caps;
    }

    .help-itema:hover {
        background-color: #e0e0e0;
    }

    .help-itema:active {
        background-color: #d0d0d0;
    }
</style>

</html>