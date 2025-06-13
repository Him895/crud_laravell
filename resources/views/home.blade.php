
<x-messagebanner msg="User Login successfully" class="success"/>
<x-messagebanner msg="User signup successfully" class="success"/>

<br>
<br>
<x-messagebanner msg="Password is not match" class="error"/>

<h1>home page</h1>

<style>
    .success {
       background-color: lightgreen;
       color: darkgreen;
         padding: 3px 10px;
         border-radius: 5px;
         display: inline-block;
            margin: 5px 0;
    }
    .error {
       background-color: red;
       color: black;
         padding: 3px 10px;
         border-radius: 5px;
         display: inline-block;
            margin: 5px 0;
    }
</style>
