<html>

<head>
    <title>Print Laporan</title>

</head>

<style>
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
</style>
<body>
    <table cellspacing="0" border="0" width="100%">
        <colgroup width="75"></colgroup>
        <colgroup width="176"></colgroup>
        <colgroup width="431"></colgroup>
        <tbody>
            <tr>
                <td colspan="3" valign="middle" bgcolor="#5f76e8" align="center"><b>
                        <font size="4" face="Times New Roman" color="#FFFFFF">Pendapatan</font>
                    </b></td>
            </tr>
            <tr>
                <td colspan="2" valign="middle" bgcolor="#F2F2F2" align="left"><b>
                        <font face="Times New Roman">Kategori</font>
                    </b></td>
                <td valign="middle" bgcolor="#F2F2F2" align="right"><b> 
                        <font face="Times New Roman"> Jumlah </font>
                    </b></td>
                <td valign="middle" bgcolor="#F2F2F2" align="right"><b> 
                        <font face="Times New Roman"> Jumlah </font>
                    </b></td>
            </tr>
            @foreach($employees as $data)
            <tr>
                <td colspan="2" valign="middle" align="left">
                    <font face="Times New Roman"></font>
                </td>
                <td valign="middle" align="right">
                    <font face="Times New Roman">  </font>
                </td>
            </tr>
            @endforeach

            <tr>
                <td style="border-top: 1px solid #000000" colspan="2" valign="middle" align="left"><b>
                        <font size="3" face="Times New Roman">Total Pendapatan</font>
                    </b></td>
                <td style="border-top: 1px solid #000000"valign="middle" align="right"><b>
                        <font size="3" face="Times New Roman"> </font>
                    </b></td>
            </tr>
            <tr>
                <td valign="middle" align="left">
                    <font face="Times New Roman"><br></font>
                </td>
                <td valign="middle" align="right"><i>
                        <font face="Times New Roman"><br></font>
                    </i></td>
                <td valign="middle" align="left">
                    <font face="Times New Roman"><br></font>
                </td>
            </tr>


        </tbody>
    </table>
</body>
</html>