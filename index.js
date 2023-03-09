
function RedirectConnexion() {
    console.log("redirection page connexion")
}

function RedirectAcceuil(){
    window.location.href = "index.php";
}

function RedirectArticle() {
    window.location.href = "Articles.php";
}

var Lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ullamcorper volutpat tortor, non faucibus enim aliquet eu. Phasellus aliquam lorem diam, quis dapibus metus dignissim vel. Suspendisse nec mattis eros, in fringilla tortor. Morbi sapien ex, tincidunt id egestas id, interdum a sapien. In hac habitasse platea dictumst. Suspendisse eu semper ligula. Nulla et odio pharetra, tempus enim eu, hendrerit eros. Praesent aliquam libero a aliquam viverra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras nisl ipsum, blandit nec vestibulum in, faucibus vel sem. Nunc interdum lacinia lorem eget blandit. Phasellus nibh massa, sagittis at augue eu, malesuada tincidunt ipsum. Duis eros diam, euismod eu turpis nec, placerat efficitur nisl. Nunc et arcu libero. Nam aliquam leo bibendum convallis pulvinar. Vestibulum quis nisl ultrices, rutrum ligula ut, convallis mi. Praesent imperdiet libero est, sed tincidunt leo congue non. Aliquam erat volutpat. Nam varius tortor neque, non tempus metus malesuada sed. Nullam volutpat porta lacus, vitae ultrices nulla aliquam eu. Morbi ut eleifend odio. Vestibulum dictum vitae dui at accumsan. Cras quis lacus eget tellus pharetra dignissim. Donec tincidunt imperdiet ornare. Duis vulputate arcu eget justo molestie condimentum. Cras finibus vestibulum facilisis. Aenean non mi leo. Donec molestie congue metus sed viverra. Integer elit justo, feugiat at luctus nec, suscipit gravida lorem. Duis vitae vulputate erat. Aliquam elementum auctor risus, eget commodo eros iaculis eu. Maecenas blandit sed tellus at porttitor. Mauris pharetra ullamcorper velit, sit amet ultrices odio rhoncus et. Aenean efficitur finibus ipsum, sed vehicula ex sollicitudin vel. Quisque quis auctor lacus. Praesent ac mauris eget enim lobortis sodales. Suspendisse potenti. Sed eget purus massa. Pellentesque nec aliquet erat, sit amet eleifend est. Aenean faucibus at odio ut pharetra. Nullam ipsum ex, tempor a lobortis quis, condimentum ut justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent vitae dignissim nunc. Praesent fermentum porttitor nisl, at vestibulum tellus dictum vitae. Mauris libero nunc, ornare quis neque semper, ullamcorper tincidunt tellus. Nunc at velit venenatis, varius orci eu, congue odio. Duis malesuada risus at enim placerat, egestas commodo tellus vestibulum. Aenean efficitur dui nulla. Pellentesque euismod dictum imperdiet. Vivamus non scelerisque eros, quis pellentesque libero. Sed pulvinar hendrerit eros. Praesent sagittis nulla at leo consequat, sed lacinia eros facilisis. Quisque in velit blandit magna gravida pellentesque. Duis faucibus tellus vitae sem vestibulum, ac condimentum ligula porttitor. Nulla facilisi. Aliquam egestas ornare scelerisque. Curabitur leo felis, aliquam quis nibh a, varius placerat tellus. Nullam et vestibulum dui. Maecenas auctor imperdiet gravida. Quisque finibus facilisis turpis, sed porta libero pharetra eu. Proin blandit justo sed erat dapibus, at iaculis massa vestibulum. Mauris viverra elementum erat ut finibus. Sed sit amet nisl velit."


function ShowArticle() {
    var titre = "ON RECUPERE LE TITRE DE L'ARTICLE DANS LA BASE DE DONNEE"
   
    let article =document.createElement("article")
    article.setAttribute("id", "ArticleBox");
    article.setAttribute("onclick", "RedirectArticle()");

    let Titre =document.createElement("div")
    Titre.setAttribute("id", "Titre");
    Titre.innerText = titre;

    let Texte =document.createElement("div")
    Texte.setAttribute("id", "Article");
    Texte.innerText = Lorem;

    article.append(Titre,Texte)

    document.getElementById("DerniersArticles").append(article);

}


ShowArticle()
ShowArticle()




