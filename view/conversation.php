<?php
include 'bienvenue.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Chat en Groupe</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 800px;
        margin: 10px ;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display :inline;
    }
    

    #message-input {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    #send-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        padding: 8px;
        margin: 5px 0;
        display: inline-block;
    }
    .containers {

        display: flex;
        height:90%;
        }
        .container1 {
        width: 340px;
        margin: 10px ;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }

    .conversation {
      width: 70%;
      display: flex;
      flex-direction: column;
    }

    .messages {
      flex: 1;
      padding: 15px;
      overflow-y: auto;
      background-color: #f9f9f9;
    }
    .message {
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 10px;
      
    }
    .input-group {
      border-top: 1px solid #ccc;
      padding: 10px;
      background-color: #fff;
    }
    .input-group input {
      border: none;
      outline: none;
    }
    .message.sent {
      background-color: #dcf8c6;
      align-self: flex-end;
    }
    .user-list, .active-user-list {
      width: 30%;
      border-right: 1px solid #ccc;
      overflow-y: auto;
      background-color: #f7f7f7;
    }
    .utilisateur-container:hover {
      background-color:gray;
    }
    .etat-container:hover{
        background-color:gray;
    }
</style>
</head>
<body>
<div class="containers mt-5 chat-container">

<div class="container1 col-md-6">
    <h1>Statut des personnes</h1>
    <table>
        <tr class="user-list">
            <th >Conversation</th>
            <th>Statut</th>
            <th>Rapport</th>
        </tr>
        <tr>
            <td id='ligneNom'></td>
            <td id='ligneEtat'></td>
            <td id='ligneRapport'></td>
        </tr>
    </table>
</div>

    <div class="col-md-6 conversation ">
        <div class="messages " id="messages" >
            
        </div>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Écrire un message..." id="message-input">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" onclick="sendMessage()">Envoyer</button>
          </div>
        </div>
      </div>
</div>

    

    <script>
        window.onload= loadMessages();
        window.onload= loadUsers();
        window.onload= loadState();
        function sendMessage(){
            var xhr =new XMLHttpRequest ();
            var msg=document.getElementById("message-input");
            xhr.onreadystatechange=function(){
                if (xhr.readyState==4 && xhr.status==200){//message envoyé et recu
                    msg.value="";
                    window.location.reload();
                }
                else{
                    console.log(xhr.responseText);
                }
            }
            xhr.open('POST','../controller/msgController.php?action=send',true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("message="+msg.value);

        }
        function loadMessages(){
           var xhr = new XMLHttpRequest();
            var msg = document.getElementById("message");
            xhr.onreadystatechange = function() {
                if (xhr.readyState==4 && xhr.status==200) {    
                    const messageElement = document.createElement('div');

                        document.getElementById("messages").innerHTML=xhr.responseText; // Si le message est envoyé avec succès, on vide la zone des messages
                    
                    } else {
                        console.log(xhr.responseText);
                    }
                
            };
            xhr.open('GET', '../controller/msgController.php?action=msgs', true);
            xhr.send();
        }
        setInterval(loadMessages(),1000);

        function loadUsers(){
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState==4 && xhr.status==200) {
                    document.getElementById("ligneNom").innerHTML=xhr.responseText;
                    } else {
                        console.log(xhr.responseText);
                    }
                
            };
            xhr.open('GET', '../controller/userController.php?action=users', true);           
            xhr.send();
        }
        setInterval(loadUsers(),1000);
        function loadState(){
            var xhr2 = new XMLHttpRequest();
            xhr2.onreadystatechange = function() {
                if (xhr2.readyState==4 && xhr2.status==200) {
                    document.getElementById("ligneEtat").innerHTML=xhr2.responseText;
                    } else {
                        console.log(xhr2.responseText);
                    }
                
            };
            xhr2.open('GET', '../controller/userController.php?action=state', true);
            xhr2.send();
        }
        setInterval(loadState(),1000);
        function loadRapport(){
            var xhr2 = new XMLHttpRequest();
            xhr2.onreadystatechange = function() {
                if (xhr2.readyState==4 && xhr2.status==200) {
                    document.getElementById("ligneRapport").innerHTML=xhr2.responseText;
                    } else {
                        console.log(xhr2.responseText);
                    }
                
            };
            xhr2.open('GET', '../controller/userController.php?action=rapport', true);
            xhr2.send();
        }
        setInterval(loadRapport(),1000);


    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
