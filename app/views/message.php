<?php include 'includes/header.php' ?>
<?php echo isset($title) ? $title : ''; ?>

<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
                        <?php foreach($users as $user): ?>
						<li class="active">
                            <a href="/message?id=<?php echo $user['id'] ?>">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="<?php echo $user['avatar'] ?>" class="rounded-circle user_img">
                                        <span class="offline_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span><?php echo $user['firstname'] . ' '. $user['surname'] ?></span>
                                        <p><?php echo $user['firstname'] . ' is offline' ?></p>
                                    </div>
                                </div>
                            </a>
						</li>
                        <?php endforeach; ?>
						
						</ui>
					</div>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
                    
                
                    <?php if($receiver): ?>
                    <div class="card">
                            <div class="card-header msg_head">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="<?php echo $receiver['avatar'] ?>" class="rounded-circle user_img">
                                        <span class="offline_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>Chat with <?php echo $receiver['firstname'] ?></span>
                                        <p>1767 Messages</p>
                                    </div>
                                    <div class="video_cam">
                                        <span><i class="fas fa-video"></i></span>
                                        <span><i class="fas fa-phone"></i></span>
                                    </div>
                                </div>
                                <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                                <div class="action_menu">
                                    <ul>
                                        <li><i class="fas fa-user-circle"></i> View profile</li>
                                        <li><i class="fas fa-users"></i> Add to close friends</li>
                                        <li><i class="fas fa-plus"></i> Add to group</li>
                                        <li><i class="fas fa-ban"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
						<div class="card-body msg_card_body">
                            <?php foreach ($messages as $msg): ?>
                                <?php if ($msg['sender_id'] == $sender_id): ?>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="img_cont_msg">
                                        <img src="<?php echo $sender['avatar'] ?>" class="rounded-circle user_img_msg">
                                    </div>
                                    <div class="msg_cotainer">
                                    <?php echo $msg['message'] ?>
                                        <!-- <span class="msg_time">8:40 AM, Today</span> -->
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="<?php echo $receiver['avatar'] ?>" class="rounded-circle user_img_msg">
                                    </div>
                                    <div class="msg_cotainer">
                                    <?php echo $msg['message'] ?>
                                        <!-- <span class="msg_time">8:40 AM, Today</span> -->
                                    </div>
                                </div>
                                <?php endif;?>
                            <?php endforeach; ?>
							
                        </div>
                        <form action="/message?id=<?php echo $receiver['id'] ?>" method="post">
                            <div class="card-footer">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                    </div>
                                    <textarea name="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text send_btn" value="">send</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                <?php endif; ?>
				</div>
			</div>
		</div>

        <link rel="stylesheet" href="assets/css/message.css" type="text/css">







<script>
    $(".msg_card_body").scrollTop($(".msg_card_body")[0].scrollHeight);

</script>


<?php include 'includes/footer.php' ?>