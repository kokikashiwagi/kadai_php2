<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>trip memory</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Trip memory</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <!-- <legend>Trip Memory</legend> -->
    <table>
    <tr>
      <td width=200px>
        <label>your name 
      </td>
      <td>
        <input type="text" name="name" ></label><br>
      </td>
    </tr>
    <tr>
      <td>
        <label> country <br> (tap the map below)
        </td>
        <td>
         <input type="text" name="cname" id='ctn'  style="background-color:#dcdcdc;" readonly></label><br>
      </td>
    </tr>
     <tr>
     <td>
     <label>how was it?
     </td>
      <td>
       <select name=star>
            <option value=★>★</option>
            <option value=★★>★★</option>
            <option value=★★★>★★★</option>
            <option value=★★★★>★★★★</option>
            <option value=★★★★★>★★★★★</option>
        </select><br>
      </td>
      </tr>
      <tr>
      <td>
        <label>comment
        </td>
        <td>
          <textArea name="comment" rows="4" cols="40"></textArea></label><br>
      </td>
      </tr>
      <tr>
      <td>
      </td>
      <td>
        <input type="submit" value="submit">
      </tr>
      </td>

    </table>
    </fieldset>
  </div>
</form>



<!-- 地図表示ゾーン -->
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
<script src="./datamaps.world.min.js"></script>
<!-- <div id="container" style="position: relative; width: 500px; height: 300px;"></div> -->
<div id="container" style="position: relative; width: 500px; height: 300px;"></div>

<!-- <script>
var map = new Datamap({element: document.getElementById('container')});
var basic = new Datamap({
  element: document.getElementById("basic")
});
</script> -->

<script>
    var map = new Datamap({
        element: document.getElementById('container'),
        done: function(datamap) {
            datamap.svg.selectAll('.datamaps-subunit').on('click', function(geography) {
                // alert(geography.properties.name);
                // console.log("a");
                document.getElementById("ctn").value = geography.properties.name ;

            });
        }
    });
</script>
<!-- ここまで地図表示ゾーン -->

<!-- Main[End] -->

  
</body>
</html>
