var t;

function startSearch(){
  if(t) window.clearTimeout(t);
  t = window.setTimeout("liveSearch()", 200);
}

function liveSearch(){
  query = document.getElementById("search_box").value;
  filename = "include/search.php?query=" + query;
  ajaxCallback = displayResults;
  ajaxRequest(filename);
}

function displayResults(){
  ul = document.getElementById("list");
  div = document.getElementById("results");
  div.removeChild(ul);

  ul = document.createElement("ul");
  ul.id = "list";
  names = ajaxreq.responseXML.getElementsByTagName("name");
  for(i = 0; i < names.length; i++){
    li = document.createElement("li");
    a = document.createElement("a");
    name = names[i].firstChild.nodeValue;
    text = document.createTextNode(name);
    a.appendChild(text);
    a.href = "http://www.google.com";
    li.appendChild(a);
    ul.appendChild(li);
  }
  if(names.length == 0){
    li = document.createElement("li");
    li.appendChild(document.createTextNode("No results..."));
    ul.appendChild(li);
  }
  div.appendChild(ul);
}
obj = document.getElementById("search_box");
obj.onkeydown = startSearch;
