<?php?>
<div class="container-radian">
            <div class="container">
                <article>
                	<div class="news">
                        <h3>最新消息</h3>
                        <asp:ListView ID="MessageListView">
<LayoutTemplate>
<asp:PlaceHolder ID="itemPlaceholder"></asp:PlaceHolder>
</LayoutTemplate>
<ItemTemplate>
  <div class="per100">
                            <div class="few_comments">
                                <div class="newsdate"><%#Eval("PublishDate")%></div>
                                <div class="entry-meta">
                                <a href='messageDetail.php?id=<%#Eval("Id")%>'"><%#Eval("Title")%></a></div>
                            </div>
                        </div>
</ItemTemplate>
<EmptyDataTemplate>
 <div class="per100">
                            <div class="few_comments">
                                <div class="newsdate">
                                   
                                </div>
                                <div class="entry-meta">
                                <a href="#">暫無訊息</a></div>
                            </div>
                        </div>
</EmptyDataTemplate>

                        </asp:ListView>
                      
                      
                    
                    </div>
                
                    <div id="picleft">
                        <img class="index-leftimg01" src="title01.png">  
                    </div>
                </article>
                <aside>
                    <div id="picright">
                       <img class="character" src="people01.png" >
                    </div>
                </aside>
               
            </div>
        </div>

</asp:Content>
        
     
        
    
    	
	

