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
    xmlHttp.onreadystatechange = onReady;
    xmlHttp.send(null);

}

function onReady()
{
    obj = JSON.parse( xmlHttp.responseText );
    if(! obj["stream"]){ return; }

    stream = obj["stream"];

    for( row in stream)
    {
	console.log(row);
    }
}

function loadChatArea()
{
    getChatData();

}