<?php
    session_start();
    if ($_SESSION["sid"] == null)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:SchoolLogin.php");
    }
?>
                <div class="campus-title">
                    <header>
                        <h2>經費變更申請</h2>
                    </header>
                </div>
                <form id="form2" runat="server"  >
                    <section class="campus-content">
                	    <div class="campus-boder">
                            <table class="campus-table">
                                <colgroup>
                                    <col class="campustitleA01">
                                    <col class="campustitleA02">
                               
                                </colgroup>
                            <tbody>
                        	    <tr>
                                
                                    <td><a href="../經費變更.zip" target="_blank"><input type="button" name="Change" value="填寫經費變更表" id="Change" class="btn btn-lg campus-btn"></a> </td>
                                </tr>
                            
                            </tbody>
                            </table>
                        </div>
                    	
                
                    </section>
                </form>
    <script>
        if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
            var referLink = document.createElement('a');
            referLink.href = url;
            document.body.appendChild(referLink);
            referLink.click();
        } else {
            location.href = url;
        }
    </script>
</asp:Content>
