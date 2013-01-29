	<div id="footer">
		<div class="cAlign">
			<br>
			<div>
					
				<ul>				
					<li><a href="https://twitter.com/BishopAsh" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @BishopAsh</a></li>
<!-- 					<li><a href="#"><img src="img/social/facebook.png" alt="Facebook" /></a></li> -->
<!-- 					<li><a href="#"><img src="img/social/rss.png" alt="RSS" /></a></li> -->
				</ul>
				
			</div>
		</div>
			
		<img src="css/images/basicsLogoSmall.png" alt="EMSA" />
		
		<p>&copy; Copyright <?php echo date("Y", time()); ?>. <a href="mailto:vedransola@gmail.com">Vedran Šola</a></p>
		
	</div>

</div>
</body>
		
</html>
<?php 
if(isset($database)) {
	$database->close_connection();
}
?>