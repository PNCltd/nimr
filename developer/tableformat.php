<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body >
<h1 style='color:#f40;' align="center">Hi Staff!</h1>
<h2 align="center">Your attension is needed to attend to an issue.</h2>
				
<h2 align="center">Issue Discription</h2>

<table align="center" class="stirp">
  
  <tr >
    <td>Requester</td>
    <th style="color:#780608 ">".$_POST['requester']."</th>
  </tr>
  <tr>
    <td>Issue</td>
    <td st>".$_POST['issue']."</td>
  </tr>
  <tr>
    <td>Issue Category</td>
    <td>".$issue_catg."</td>
  </tr>
  <tr>
    <td>Requested From</td>
    <td>".$_POST['location']."</td>
  </tr>
  <tr>
    <td>IT Staff Assigned</td>
    <td>".$IT_staff_ass."</td>
  </tr>
  <tr>
    <td>Date Reported</td>
    <td>".$date_assigned."</td>
  </tr>
  <tr>
    <td>Date Assigned</td>
    <td>".$date_assigned."</td>
     </tr>
    
  
</table>
<p align="center">Please click the link below to login to your account.</p>
				<h4 align="center"><a href='http://www.issuelog.com/activate.php?uid=$issue_catg&code=$date_assigned'>login to My Account</h4>

</body>
</html>