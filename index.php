<!DOCTYPE html>
<html>
<head>

<style>
html, body {
    background-color: #000;
    color: #ff0;
}
</style>
<title>Pass PHP and JS variables to each other test</title>


</head>
<body>

<br>
<h1>Pass PHP and JS variables to each other test</h1>

<?php 
$testarray = ["this", "is", "me"];
$testobject = array("this"=>"that", "is"=>"was", "me"=>"him");
$teststring = "this is me";
$testint = 9758.25;


echo '<br>';
echo '<h3>Set 4 different PHP variables</h3>';
echo '<br>';

echo '$var1 = ["this", "is", "me"];';
echo '<br><br>';
echo '$var2 = array("this"=>"that", "is"=>"was", "me"=>"him");';
echo '<br><br>';
echo '$var3 = "this is me";';
echo '<br><br>';
echo '$var4 = 9758.25;';

echo '<br><br>';

echo '<h3>VAR DUMP of the PHP variables</h3>';
echo '<br>';
var_dump($testarray);
echo '<br><br>';
var_dump($testobject);
echo '<br><br>';
var_dump($teststring);
echo '<br><br>';
var_dump($testint);
echo '<br><br>';

echo '<h3>ECHO of the PHP variables</h3>';
echo '<br>';
foreach ($testarray as $test) {
    echo $test . " / ";
}
echo '<br><br>';
foreach ($testobject as $test) {
    echo $test . " / ";
}
echo '<br><br>';
echo $teststring;
echo '<br><br>';
echo $testint;
echo '<br><br>';

echo '<h3>Document.write of JS variables passed directly</h3>';
echo '<br>';

echo '<script>
console.log("== Document.write of JS variables passed directly");
var testarray = '.$testarray.';
var testobject = '.$testarray.';
var teststring = '.$testarray.';
var testint = '.$testint.';

console.log("== Test array ==");
document.write(testarray + "<br>");
console.log(testarray);

console.log("== Test object ==");
document.write(testobject + "<br>");
console.log(testobject);

console.log("== Test string ==");
document.write(teststring + "<br>");
console.log(teststring);

console.log("== Test int ==");
document.write(testint);
console.log(testint);

</script>';

echo '<br><br>';
echo '<h3>Document.write of JS variables passed with json.encode()</h3>';
echo '<br>';

echo '<script>
console.log("== Document.write of JS variables passed with json.encode()");
var testarray = '.json_encode($testarray).';
var testobject = '.json_encode($testarray).';
var teststring = '.json_encode($testarray).';
var testint = '.json_encode($testint).';

console.log("== Test array ==");
document.write(testarray + "<br>");
console.log(testarray);

console.log("== Test object ==");
document.write(testobject + "<br>");
console.log(testobject);

console.log("== Test string ==");
document.write(teststring + "<br>");
console.log(teststring);

console.log("== Test int ==");
document.write(testint);
console.log(testint);

function postIt()   {
    CreateForm();
    SubmitForm();
    }

function rePostIt()   {
    CreateForm();
    addRePost();
    SubmitForm();
}

function CreateForm()   {
    form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", "/");

    formtestarray = document.createElement("input");
    formtestarray.setAttribute("name", "testarray");
    formtestarray.setAttribute("value", testarray);

    formtestobject = document.createElement("input");
    formtestobject.setAttribute("name", "testobject");
    formtestobject.setAttribute("value", testobject);

    formteststring = document.createElement("input");
    formteststring.setAttribute("name", "teststring");
    formteststring.setAttribute("value",teststring);

    formtestint = document.createElement("input");
    formtestint.setAttribute("name", "testint");
    formtestint.setAttribute("value", testint);


    form.appendChild(formtestarray);
    form.appendChild(formtestobject);
    form.appendChild(formteststring);
    form.appendChild(formtestint);

    document.body.appendChild(form); 
};

function SubmitForm() {
    form.submit();
};


function addRePost() {
    formtestarray = document.createElement("input");
    formtestarray.setAttribute("name", "retestarray");
    formtestarray.setAttribute("value", JSON.stringify(testarray));

    formtestobject = document.createElement("input");
    formtestobject.setAttribute("name", "retestobject");
    formtestobject.setAttribute("value", JSON.stringify(testobject));

    formteststring = document.createElement("input");
    formteststring.setAttribute("name", "reteststring");
    formteststring.setAttribute("value", JSON.stringify(teststring));

    formtestint = document.createElement("input");
    formtestint.setAttribute("name", "retestint");
    formtestint.setAttribute("value", JSON.stringify(testint));


    form.appendChild(formtestarray);
    form.appendChild(formtestobject);
    form.appendChild(formteststring);
    form.appendChild(formtestint);

    document.body.appendChild(form);
};


</script>';

echo '<br><br>';
echo '<h3>POST js variables back to PHP</h3>';
echo '<br>';
echo '<button onclick="postIt();">Send variables</button>';
echo '<br><br>';

echo '<h3>var_dump the posted variables directly</h3>';
echo '<br>';

$post_testarray = $_POST['testarray'];
$post_testobject = $_POST['testobject'];
$post_teststring = $_POST['teststring'];
$post_testint = $_POST['testint'];

var_dump($post_testarray);
echo '<br><br>';
var_dump($post_testobject);
echo '<br><br>';
var_dump($post_teststring);
echo '<br><br>';
var_dump($post_testint);
echo '<br><br>';

echo '<h3>json_decode and then var_dump the posted variables</h3>';
echo '<br>';

$json_testarray = json_decode($post_testarray);
$json_testobject = json_decode($post_testobject);
$json_teststring = json_decode($post_teststring);
$json_testint = json_decode($post_testint);

var_dump($json_testarray);
echo '<br><br>';
var_dump($json_testobject);
echo '<br><br>';
var_dump($json_teststring);
echo '<br><br>';
var_dump($json_testint);
echo '<br><br>';


echo '<h3>Not working.  Lets json.stringify the original js variables and resend via post</h3>';
echo '<br>';
echo '<button onclick="rePostIt();">stringify and resend variables</button>';
echo '<br><br>';

echo '<h3>var_dump the posted variables directly</h3>';
echo '<br>';

$post_testarray = $_POST['retestarray'];
$post_testobject = $_POST['retestobject'];
$post_teststring = $_POST['reteststring'];
$post_testint = $_POST['retestint'];

var_dump($post_testarray);
echo '<br><br>';
var_dump($post_testobject);
echo '<br><br>';
var_dump($post_teststring);
echo '<br><br>';
var_dump($post_testint);
echo '<br><br>';









?>

</body>
</html>
