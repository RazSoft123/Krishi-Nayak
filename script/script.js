//This is scrop for the 
/*
function test() {
  alert("THis is page");
}

onload = test;

*/

var userOptions, rDropDown;

  //Function to show the notification on the website.
  function notification_show(msg, timeout=2000){
    msgBox = document.getElementById('r_notification');
    msgBox.innerHTML = "<p>"+msg+"</p>";
    msgBox.style.display = "flex";
    setTimeout(notification_hide, timeout);
  }

  function notification_hide(){
    msgBox = document.getElementById('r_notification');
    msgBox.innerHTML = "";
    msgBox.style.display = "none";
  }

function showOptions() {
  //userOptions.style.setproperty('display')
  //alert("You clicked user options ")
  userOptions.style.display = "flex";
 // console.log("Show box get clicked")
}

function initialzeVars(){
  userOptions = document.getElementById("useroption");
  usericon = document.getElementById("usericon");

  usericon.onclick = showOptions;

  /*
  usericon.addEventListener('click', function(event) {
    event.stopPropagation();
    console.log("Propagation stopped");
  });
*/
}

function hideOption(event) {
  if(usericon !== event.target){
    userOptions.style.display = "none";
    //console.log("Hide box get called")
  }
}

//Function to share the post 
function shr_facebook(postid){
  shareUrl = "http://localhost/krishi_nayak/posts.php?postid="+postid;
  shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent("http://localhost/krishi_nayak/posts.php?postid="+postid);
  notification_show("Post shared on facebook");
  window.open(shareUrl, '_blank');
}

function shr_twitter(postid){
  shareUrl = "https://twitter.com/intent/tweet?text="+encodeURIComponent("http://localhost/krishi_nayak/posts.php?postid="+postid);
  notification_show("Post shared on twitter");
  window.open(shareUrl, '_blank');
}

function shr_linkedin(postid){
  shareUrl = "https://www.linkedin.com/shareArticle?mini=true&url="+encodeURIComponent("http://localhost/krishi_nayak/posts.php?postid="+postid);
  notification_show("Post shared on Linkedin");
  window.open(shareUrl, '_blank');
}

function shr_copy_link(postid){

    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText("http://localhost/krishi_nayak/posts.php?postid="+postid);
      notification_show("Post link copied on clipboard");
      return;
    }
  
    const textArea = document.createElement('textarea');
    textArea.value = textToCopy.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    textArea.remove();

    notification_show("Post link copied on clipboard");
}

document.addEventListener('click', hideOption);
onload = initialzeVars;

