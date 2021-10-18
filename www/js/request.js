$(document).ready(function () {
    $('#btn_submit').click(function () {
            var id = $('#id').val().trim();
            ShowMeetingInfoById(id, "result");
            });
});

function ShowMeetingInfoById(id, el) {

    var xhttp = new XMLHttpRequest();
    var url = 'process.php';
    var params = 'id=' + id + '&method=xml';
    xhttp.open('POST', url, true);
 
    //Send the proper header information along with the request
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (xhttp.responseXML == null) {
                    document.getElementById(el).innerHTML = "<b> #" + id + "</b></br> Not found"; 
                    } else {
                               result =  GetInfo(xhttp.responseXML);
                               document.getElementById(el).innerHTML = "<b> #" + id + "</b></br>" + result; 
                            }
                }
    };

     xhttp.send(params); 
    }


function GetInfo(xml) {
    var txt = "";
    path = "/root/table[@name='meeting']/fields/field/@*";

    if (xml.evaluate) {
        var nodes = xml.evaluate(path, xml, null, XPathResult.ANY_TYPE, null);
        var result = nodes.iterateNext();
        while (result) {
                    txt += "<b>" + result.nodeName + ":</b> " + result.nodeValue + "<br>";
                    result = nodes.iterateNext();
        }

    // Code For Internet Explorer
    } else if (window.ActiveXObject || xhttp.responseType == "msxml-document") {
        xml.setProperty("SelectionLanguage", "XPath");
        nodes = xml.selectNodes(path);
        for (i = 0; i < nodes.length; i++) {
                    txt += "<b>" +  nodes[i].nodeName + ":</b> " +  nodes[i].nodeValue + "<br>";
        }

            }

    return txt;

    }



