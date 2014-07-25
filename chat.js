/******************************
 * Controller for chat.php 
 *
 * @author Per-Henrik Kvalnes
 ******************************/

var xmlHttp = null;

function getChatData()
{
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "chatData.php", true);
    xmlHttp.overrideMimeType('application/json');
    xmlHttp.onreadystatechange = onReady;
    xmlHttp.send(null);

}

function onReady()
{
    obj = JSON.parse( xmlHttp.responseText );
    console.log(obj);
    
    stream = obj["stream"];
    if(! stream){return};

    /** get and clear chatArea **/
    divChatArea = document.getElementById("chatArea");
    divChatArea.innerHTML = "";

    /** update chat area **/
    for(i in stream)
    {
	/** set up message row **/
	row = stream[i];
	chatRow = document.createElement("div");
	chatRow.className = 'chatRow';


	/** add nickname to row **/
	nickname = document.createElement("p");
	nickname.className = "nicknameString";
	nickname.innerHTML = row["nickname"];
	chatRow.appendChild(nickname);



	/** add message **/
	message = document.createElement("p");
	message.className = "messageString";
	message.innerHTML = row["message"];
	chatRow.appendChild(message);
	chatRow.appendChild(document.createElement("br"));

	divChatArea.appendChild(chatRow);
    }
    chatArea.scrollTop = chatArea.scrollTopMax;
}

function loadChatArea()
{
    getChatData();

}