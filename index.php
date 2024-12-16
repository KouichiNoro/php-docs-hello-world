<!doctype html>

<HTML lang="ja">

<HEAD></HEAD>

<BODY bgcolor="white">

Version 0.0.1

<form action="https://paypaytest01-c7gebhc9bndgdyg4.japaneast-01.azurewebsites.net/PayPayCreateQR.php" method="get" >
    <label>QRコード作成：</label>
    <input type="submit" value="作成" />
</form>

<form action="https://paypaytest01-c7gebhc9bndgdyg4.japaneast-01.azurewebsites.net/PayPayDeleteQR.php" method="get" >
    <label>QRコード削除：</label><input type="text" name="codeId">
    <input type="submit" value="削除" />
</form>

</BODY>



</HTML>