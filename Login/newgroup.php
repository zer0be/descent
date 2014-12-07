<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formCreateGroup")) {
  $insertSQL = sprintf("INSERT INTO tbgroup (grp_name, grp_creation, grp_startedby, grp_state_country, grp_city) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['grp_name'], "text"),
                       GetSQLValueString($_POST['grp_creation'], "date"),
                       GetSQLValueString($_POST['grp_startedby'], "text"),
                       GetSQLValueString($_POST['grp_state_country'], "text"),
                       GetSQLValueString($_POST['grp_city'], "text"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  $insertGoTo = "create.php?urlGrpName=" . $_POST['grp_name'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


?>

<body>
  <table>
    <tr>
      <td><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" /></a>
      <table width="385" border="0" cellpadding="15" cellspacing="0" class="blackTable">
        <tr>
          <td align="center" class="pageTitle"><p>Create a New Gaming Group</p>
            <form action="<?php echo $editFormAction; ?>" method="post" name="formCreateGroup" id="formCreateGroup">
              <table align="center">
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">Name of Gaming Group:</td>
                  <td><input type="text" name="grp_name" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">State or Country:</td>
                  <td><input type="text" name="grp_state_country" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">City:</td>
                  <td><input type="text" name="grp_city" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td><input name="buttonCreateGroup" type="submit" id="buttonCreateGroup" value="Create Group" /></td>
                </tr>
              </table>
              <input type="hidden" name="grp_creation" />
              <input type="hidden" name="grp_startedby" value="<?php echo $_SESSION['MM_Username']; ?>" />
              <input type="hidden" name="MM_insert" value="formCreateGroup" />
            </form>
          </td>
        </tr>
      </table>
    </tr>
  </table>
</body>
</html>
