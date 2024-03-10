<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <style>
	@import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");
	
	* {
		box-sizing: border-box;
	}
	
	:root {
		--app-container: #f3f6fd;
		--main-color: #1f1c2e;
		--secondary-color: #4a4a4a;
		--link-color: #1f1c2e;
		--link-color-hover: #c3cff4;
		--link-color-active: #fff;
		--link-color-active-bg: #1f1c2e;
		--projects-section: #fff;
		--button-bg: #1f1c24;
		--search-area-bg: #fff;
	}
	
	.dark:root {
		--app-container: #1f2029;
		--main-color: #ffeba7;
		--secondary-color: rgba(255, 255, 255, .8);
		--projects-section: #2b2e38;
		--link-color: #ffeba7;
		--link-color-hover: rgba(195, 207, 244, 0.1);
		--link-color-active-bg: rgba(195, 207, 244, 0.2);
		--button-bg: #2b2e38;
		--search-area-bg: #2b2e38;
		--light-font: rgba(255, 255, 255, .8);
	}
	
	.dark .project-box {
		background-color: #fcf7e3;
	}
	
	.dark .tag {
		background-color: #ffeba7;
	}
	
	.dark .tag:hover {
		background-color: #3c404f;
		color: #fff;
	}

	
	html, body {
		width: 100%;
		height: 100vh;
		margin: 0;
	}
	
	body {
		font-family: 'DM Sans', sans-serif;
		overflow: hidden;
		display: flex;
		justify-content: center;
		background-color: var(--app-container);
	}
	
	button, a {
		cursor: pointer;
	}
	
	.app-container {
		width: 100%;
		display: flex;
		flex-direction: column;
		height: 100%;
		background-color: var(--app-container);
		transition: 0.2s;
		max-width: 1800px;
	}
	
	.app-container button, .app-container input, .app-container optgroup, .app-container select, .app-container textarea {
		font-family: 'DM Sans', sans-serif;
	}
	
	.app-content {
		display: flex;
		height: 100%;
		overflow: hidden;
		padding: 16px 24px 24px 0;
	}
	
	.app-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		width: 100%;
		padding: 16px 24px;
		position: relative;
	}
	
	.app-header-left, .app-header-right {
		display: flex;
		align-items: center;
	}
	
	.app-header-left {
		flex-grow: 1;
	}
	
	.app-header-right button {
		margin-left: 10px;
	}
	
	.app-icon {
		width: 26px;
		height: 2px;
		border-radius: 4px;
		background-color: var(--main-color);
		position: relative;
	}
	
	.app-icon:before, .app-icon:after {
		content: '';
		position: absolute;
		width: 12px;
		height: 2px;
		border-radius: 4px;
		background-color: var(--main-color);
		left: 50%;
		transform: translatex(-50%);
	}
	
	.app-icon:before {
		top: -6px;
	}
	
	.app-icon:after {
		bottom: -6px;
	}
	
	.app-name {
		color: var(--main-color);
		margin: 0;
		font-size: 20px;
		line-height: 24px;
		font-weight: 700;
		margin: 0 32px;
	}
	
	.mode-switch {
		background-color: transparent;
		border: none;
		padding: 0;
		color: var(--main-color);
		display: flex;
		justify-content: center;
		align-items: center;
        padding-right: 8px;
		border-right: 2px solid #ddd;
	}
	
	.add-btn {
		color: #fff;
		background-color: var(--button-bg);
		padding: 12px;
		border: 0;
		border-radius: 5px;
		height: 32px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	
	.app-sidebar {
		padding: 40px 16px;
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	
	.app-sidebar-link {
		color: var(--main-color);
		color: var(--link-color);
		margin: 16px 0;
		transition: 0.2s;
		border-radius: 50%;
		flex-shrink: 0;
		width: 40px;
		height: 40px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.app-sidebar-link:hover {
		background-color: var(--link-color-hover);
		color: var(--link-color-active);
	}
	
	.app-sidebar-link.active {
		background-color: var(--link-color-active-bg);
		color: var(--link-color-active);
	}
	
	.projects-section {
		flex: 2;
		background-color: var(--projects-section);
		border-radius: 32px;
		padding: 32px 32px 0 32px;
		overflow: hidden;
		height: 100%;
		display: flex;
		flex-direction: column;
	}
	
	.projects-section-line {
		display: flex;
		align-items: center;
		padding-bottom: 5px;
        justify-content: space-between;
	}
	
	.projects-section-line p {
		font-size: 24px;
		line-height: 32px;
		font-weight: 700;
		opacity: 0.9;
		margin: 0;
		color: var(--main-color);
	}
    
    .save-question{
		color: var(--main-color);
		color: var(--link-color);
		margin: 0px;
		transition: 0.2s;
		border-radius: 50%;
		flex-shrink: 0;
		width: 40px;
		height: 40px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.save-question:hover {
		background-color: #2c68b9;
		color: #fff;
	}

	.box-content-header {
		font-size: 16px;
		line-height: 24px;
		font-weight: 700;
		opacity: 0.7;
		text-align: left;
	}
	
	.box-content-subheader {
		font-size: 14px;
		line-height: 24px;
		opacity: 0.7;
		text-align: left;
	}
	
	.box-content-details {
        display: flex;
		margin-top: 10px;
		font-size: 12px;
		line-height: 15px;
		opacity: 0.7;
		text-align: left;
        justify-content: flex-start;
        padding-bottom: 18px;
	}

    .box-content-details span {
        margin-right: 7%; /* Adjust the margin as needed */
    }

    .content {
        text-align: justify;
    }
	
	.project-boxes {
		margin: 0 -8px;
		overflow-y: auto;
	}
	
	.project-boxes.jsGridView {
		display: flex;
		flex-wrap: wrap;
	}
	
	.project-boxes.jsGridView .project-box-wrapper {
		width: 60%;
	}

    .project-boxes.jsGridView .project-box-wrapper:not(:first-child) {
        width: 40%; /* Adjust the width of the other columns as needed */
    }
	
	.project-boxes.jsListView .project-box {
		display: flex;
		border-radius: 10px;
		position: relative;
	}
	
	.project-boxes.jsListView .project-box > * {
		margin-right: 24px;
	}
	
	.project-boxes.jsListView .more-wrapper {
		position: absolute;
		right: 16px;
		top: 16px;
	}
	
	.project-boxes.jsListView .project-box-content-header {
		order: 1;
		max-width: 120px;
	}
	
	.project-boxes.jsListView .project-box-header {
		order: 2;
	}
	
	.project-boxes.jsListView .project-box-footer {
		order: 3;
		padding-top: 0;
		flex-direction: column;
		justify-content: flex-start;
	}
	
	.project-boxes.jsListView .project-box-footer:after {
		display: none;
	}
	
	.project-boxes.jsListView .participants {
		margin-bottom: 8px;
	}
	
	.project-boxes.jsListView .project-box-content-header p {
		text-align: left;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
	
	.project-boxes.jsListView .project-box-header > span {
		position: absolute;
		bottom: 16px;
		left: 16px;
		font-size: 12px;
	}
	
	.project-boxes.jsListView .box-progress-wrapper {
		order: 3;
		flex: 1;
	}
	
	.project-box {
		--main-color-card: #dbf6fd;
		border-radius: 5px;
		padding: 16px;
        width: 90%;
		background-color: var(--main-color-card);
        float: right;
        margin-right: 5%;
        border: 1px solid #b4d5f6;
        font-size: 14px;
        color: #777;
        margin-bottom: 20px;
	}

    .project-box-title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .project-box-text {
        text-align: justify;
        line-height: 1.5; /* Adjust as needed */
    }

    .project-box-steps {
        margin-top: 15px;
    }

    .project-box-steps ul {
        list-style: disc;
        margin-left: 20px;
        padding: 0;
    }
	
	.project-box-header {
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-bottom: 16px;
		color: var(--main-color);
	}
	
	.project-box-header span {
		color: #4a4a4a;
		opacity: 0.7;
		font-size: 14px;
		line-height: 16px;
	}
	
	.project-box-content-header {
		text-align: center;
		margin-bottom: 16px;
	}
	
	.project-box-content-header p {
		margin: 0;
	}

    .project-box-content-header svg {
		margin-right: 10px;
	}
	
	.project-box-wrapper {
		padding: 8px;
		transition: 0.2s;
	}
	
	.project-box-footer {
		display: flex;
		justify-content: space-between;
		padding-top: 16px;
		position: relative;
	}
	
	.project-box-footer:after {
		content: '';
		position: absolute;
		background-color: rgba(255, 255, 255, 0.6);
		width: calc(100% + 32px);
		top: 0;
		left: -16px;
		height: 1px;
	}
	
	.mode-switch.active .moon {
		fill: var(--main-color);
	}
	
	.project-box-footer {
		display: flex;
		justify-content: space-between;
		padding-top: 16px;
		position: relative;
	}

	.project-tags {
		display: flex;
		flex-wrap: wrap;
	}

	.tag {
		background-color: #93e5fa; 
		color: #000;
		padding: 8px 12px;
		border-radius: 5px;
		margin-right: 8px;
        margin-top: 18px;
		margin-bottom: 8px;
		font-size: 14px;
		font-weight: 500;
		letter-spacing: 0.5px;
		transition: background-color 0.3s;
	}

	.tag:hover {
		background-color: #2c68b9;
		color: #fff;
	}

    .form-group {
        margin-top: 32px;
        margin-bottom: 15px;
    }

    .dark .form-group {
        color: #fff;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form-info {
        font-size: 12px;
        color: #777;
        margin-top: 5px;
    }

    .answer-header{
        border-top: 2px solid #ddd;
    }

    .answer{
        border-bottom: 2px solid #ddd;
        padding-bottom: 12px;

    }

    .answer-content{
		text-align: justify;
        width:100%;
    }

    .dark .form-info {
        color: #9e9e9e;
    }

    .btn-primary {
        background-color: #0298bf;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #08cafc;
        color: #000;
    }

    .dark .btn-primary {
        background-color: #ffeba7;
        color: #000;
    }

    .dark .btn-primary:hover {
        background-color: #ffdb61;
    }

    .editor-container {
      margin: 20px auto;
    }

    .toolbar {
      display: flex;
      border: 1px solid #ccc;

      padding: 8px;
      border-bottom: 1px solid #ccc;
    }

    .toolbar button {
      background: none;
      border: none;
      cursor: pointer;
      margin-right: 8px;
    }

    #editor {
      border: 1px solid #ccc;
      padding: 10px;
      min-height: 200px;
    }

    .vote-button {
        display: inline-block;
        margin: 10px;
        text-decoration: none;
        color: #3498db;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .vote-button.upvote:hover {
        color: #056517;
    }

    .vote-button.downvote:hover {
        color: #bf1029;
    }

	.vote-button.upvote.voted {
		color: #056517;
	}

	.vote-button.downvote.voted {
		color: #bf1029;
	}


    .questions-link{
		display: flex; 
        align-items: flex-start; 
        text-decoration: none; 
        color: #333;
	}

    .questions-link:hover{
        text-decoration: underline;
        text-decoration-color: #002D62;
    }

    .questions-img {
        margin-right: 10px; 
        margin-top: 4px;
    }

    .questions-title {
        margin: 0; 
        font-size: 14px; 
        color: #002D62
    }



	.modal {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.4);
	}

	.modal-content {
		background-color: #dbf6fd;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 40%;
		height: 10%; /* Adjust the height as needed */
		border-radius: 10px; /* Add border-radius */
	}

	.modal-content label {
		margin-bottom: 5px;
	}

	.modal-content input {
		width: 60%; 
		box-sizing: border-box;
	}

	
	@media screen and (max-width: 980px) {
		.project-boxes.jsGridView .project-box-wrapper {
			width: 50%;
		}
	}

	@media screen and (max-width: 720px) {
		.app-name, .profile-btn span {
			display: none;
		}
		
		.mode-switch {
			width: 20px;
			height: 20px;
		}
			
		.mode-switch svg {
			width: 16px;
			height: 16px;
		}
		
		.app-header-right button {
			margin-left: 4px;
		}
	}
	
	@media screen and (max-width: 520px) {
		.projects-section {
			overflow: auto;
		}
			
		.project-boxes {
			overflow-y: visible;
		}
		
		.app-sidebar, .app-icon {
			display: none;
		}
		.app-content {
			padding: 16px 12px 24px 12px;
		}
		
		.app-header {
			padding: 16px 10px;
		}
		
		.search-input {
			max-width: 120px;
		}
		
		.project-boxes.jsGridView .project-box-wrapper {
			width: 100%;
		}
		
		.projects-section {
			padding: 24px 16px 0 16px;
		}
		
		.profile-btn img {
			width: 24px;
			height: 24px;
		}
		
		.app-header {
			padding: 10px;
		}
			
		.search-input {
			font-size: 14px;
		}
		
		.box-content-header {
			font-size: 12px;
			line-height: 16px;
		}
		
		.box-content-subheader {
			font-size: 8px;
			line-height: 16px;
		}
		
		.project-boxes.jsListView .project-box-header > span {
			font-size: 10px;
		}
		
		.project-boxes.jsListView .project-box > * {
			margin-right: 10px;
		}
		
		.project-boxes.jsListView .more-wrapper {
			right: 2px;
			top: 10px;
		}
	}
    </style>
</head>
<body>
<div class="app-container">
        <div class="app-header">
			<div class="app-header-left">
				<span class="app-icon"></span>
				<p class="app-name">TechInquireHub</p>
			</div>
			<div class="app-header-right">
				<button class="mode-switch" title="Switch theme">
					<svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
						<defs></defs>
						<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
					</svg>
				</button>
				<button class="add-btn" title="Add new question" onclick="window.location.href='<?php echo site_url('dashboard/add_question'); ?>'">
					<svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
						<line x1="12" y1="5" x2="12" y2="19" />
						<line x1="5" y1="12" x2="19" y2="12" />
					</svg>
                    &nbsp Add Question
				</button>
			</div>
        </div>
		
		
        <div class="app-content">
			<div class="app-sidebar">
				<a href="<?php echo site_url('dashboard/index'); ?>" class="app-sidebar-link" title="Home dashboard">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
						<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
						<polyline points="9 22 9 12 15 12 15 22" />
					</svg>
				</a>
				
				<a href="<?php echo site_url('dashboard/questions'); ?>" class="app-sidebar-link active" title="All questions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M13.037 20.863c0 1.302 1.145 2.36 2.555 2.36c1.41 0 2.556-1.058 2.556-2.37V19.15c0-.111.073-.209.18-.242C21.676 17.85 24 14.919 24 11.562v-1.254c0-4.239-3.69-7.773-8.227-7.861c-2.28-.05-4.432.744-6.065 2.212c-1.622 1.469-2.523 3.447-2.523 5.552c0 1.311 1.155 2.369 2.566 2.369c1.41 0 2.555-1.058 2.555-2.36c0-.822.35-1.596.986-2.173a3.394 3.394 0 0 1 2.375-.872c1.78.04 3.223 1.45 3.223 3.143v1.244c0 1.468-1.124 2.731-2.683 2.996c-1.834.313-3.17 1.791-3.17 3.514zM15.5 30a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5" />
                    </svg>
				</a>

                <a href="<?php echo site_url('tag/list_tags'); ?>" class="app-sidebar-link" title="Tags">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M3 8v4.172a2 2 0 0 0 .586 1.414l5.71 5.71a2.41 2.41 0 0 0 3.408 0l3.592-3.592a2.41 2.41 0 0 0 0-3.408l-5.71-5.71A2 2 0 0 0 9.172 6H5a2 2 0 0 0-2 2" />
                            <path d="m18 19l1.592-1.592a4.82 4.82 0 0 0 0-6.816L15 6m-8 4h-.01" />
                        </g>
                    </svg>
                </a>

                <a href="<?php echo site_url('savedQuestions/index'); ?>" class="app-sidebar-link" title="Saved questions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20.496 5.627A2.25 2.25 0 0 1 22 7.75v10A4.25 4.25 0 0 1 17.75 22h-10a2.25 2.25 0 0 1-2.123-1.504l2.097.004H17.75a2.75 2.75 0 0 0 2.75-2.75v-10l-.004-.051zM17.246 2a2.25 2.25 0 0 1 2.25 2.25v12.997a2.25 2.25 0 0 1-2.25 2.25H4.25A2.25 2.25 0 0 1 2 17.247V4.25A2.25 2.25 0 0 1 4.25 2zm0 1.5H4.25a.75.75 0 0 0-.75.75v12.997c0 .414.336.75.75.75h12.997a.75.75 0 0 0 .75-.75V4.25a.75.75 0 0 0-.75-.75M10.75 6.75a.75.75 0 0 1 .75.75V10H14a.75.75 0 0 1 0 1.5h-2.5V14a.75.75 0 0 1-1.5 0v-2.5H7.5a.75.75 0 0 1 0-1.5H10V7.5a.75.75 0 0 1 .75-.75" />
                    </svg>
                </a>

                <a href="<?php echo site_url('profile/index'); ?>" class="app-sidebar-link" title="Profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linejoin="round" d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                            <circle cx="12" cy="7" r="3" />
                        </g>
                    </svg>
				</a>
        
				<a href="<?php echo site_url('helpAbout/index'); ?>" class="app-sidebar-link" title="Help and About">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 9h2V7h-2m1 13c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m-1 15h2v-6h-2z" />
                    </svg>
				</a>
			</div>
			
			<div class="projects-section">
                <div class="project-boxes jsGridView">
                    <div class="project-box-wrapper">
                        <div class="projects-section-line">
                            <p><?php echo $question['title']; ?></p>

                            <?php
                            // Get the actual user ID from your session
                            $user_id = $this->session->userdata('user_id');

                            // Assume you have a $question array with question details
                            $question_id = $question['question_id'];

                            $is_saved = $this->SavedQuestions_model->is_question_saved($user_id, $question_id);
    

                            if ($is_saved) {
                                $url = site_url('savedQuestions/unsave/' . $question['question_id']);
                                $path = '<path fill="currentColor" d="M20.496 5.627A2.25 2.25 0 0 1 22 7.75v10A4.25 4.25 0 0 1 17.75 22h-10a2.25 2.25 0 0 1-2.123-1.504l2.097.004H17.75a2.75 2.75 0 0 0 2.75-2.75v-10l-.004-.051zM17.246 2a2.25 2.25 0 0 1 2.25 2.25v12.997a2.25 2.25 0 0 1-2.25 2.25H4.25A2.25 2.25 0 0 1 2 17.247V4.25A2.25 2.25 0 0 1 4.25 2zM10.75 6.75a.75.75 0 0 0-.743.648L10 7.5V10H7.5a.75.75 0 0 0-.102 1.493l.102.007H10V14a.75.75 0 0 0 1.493.102L11.5 14v-2.5H14a.75.75 0 0 0 .102-1.493L14 10h-2.5V7.5a.75.75 0 0 0-.75-.75" />';
                            } else {
                                $url = site_url('savedQuestions/save/' . $question['question_id']);
                                $path = '<path fill="currentColor" d="M20.496 5.627A2.25 2.25 0 0 1 22 7.75v10A4.25 4.25 0 0 1 17.75 22h-10a2.25 2.25 0 0 1-2.123-1.504l2.097.004H17.75a2.75 2.75 0 0 0 2.75-2.75v-10l-.004-.051zM17.246 2a2.25 2.25 0 0 1 2.25 2.25v12.997a2.25 2.25 0 0 1-2.25 2.25H4.25A2.25 2.25 0 0 1 2 17.247V4.25A2.25 2.25 0 0 1 4.25 2zm0 1.5H4.25a.75.75 0 0 0-.75.75v12.997c0 .414.336.75.75.75h12.997a.75.75 0 0 0 .75-.75V4.25a.75.75 0 0 0-.75-.75M10.75 6.75a.75.75 0 0 1 .75.75V10H14a.75.75 0 0 1 0 1.5h-2.5V14a.75.75 0 0 1-1.5 0v-2.5H7.5a.75.75 0 0 1 0-1.5H10V7.5a.75.75 0 0 1 .75-.75" />';
                            }
                            ?>

                            <a href="<?php echo $url; ?>" title="<?= $is_saved ? 'Unsave' : 'Save' ?> question" class="save-question">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <?php echo $path; ?>
                                </svg>
                            </a>
                         </div>

                        <div class="box-content-details">
                            <span>Asked by <strong><?php echo $question['user_name']; ?></strong> on <strong><?php echo $question['created_at']; ?></strong></span>
                            <span id="voteCount"><strong><?php echo $question['upvotes'] + $question['downvotes']; ?></strong> votes</span> 
                            <span id="answerCount"><strong><?php echo $question['answer_count']; ?></strong> answers </span>
                        </div>
                        <div class="content">
                            <p><?php echo $question['content']; ?></p>
                        </div>
                        <div class="project-tags">
							<?php foreach ($question['tags'] as $tag): ?>
								<span class="tag"><?php echo $tag; ?></span>
							<?php endforeach; ?>
						</div>
      
                        <div class="answer-content">
                            <!-- Display Answers -->
                            <h3><?php echo $question['answer_count']; ?> Answers:</h3>
                            
                                <div class="answer-header">
                                    <?php foreach ($answers as $answer): ?>
                                        <div class="answer">
										<?php
										// Decode HTML entities and apply special styling to text inside <code> and <blockquote> tags
										$decodedContent = htmlspecialchars_decode($answer['content']);
										$decodedContent = preg_replace_callback(
											'/<code>(.*?)<\/code>|<blockquote>(.*?)<\/blockquote>/s',
											function ($matches) {
												// Apply the desired styling to text inside <code> and <blockquote> tags
												if (!empty($matches[1])) {
													// Handle <code> tags
													return '<code style="background-color: #f6f6f6; color: #00008B; padding: 5px; display: inline-block; margin-top: 5px; margin-bottom: 5px;">' . $matches[1] . '</code>';
												} elseif (!empty($matches[2])) {
													// Handle <blockquote> tags
													return '<blockquote style="border-left: 4px solid #c8ccd0; padding-left: 10px; margin-top: 10px; margin-bottom: 10px;">' . $matches[2] . '</blockquote>';
												}
											},
											$decodedContent
										);
										?>
										<p><?php echo $decodedContent; ?></p>

                                            <!-- Upvote button -->
                                            <a class="vote-button upvote <?php echo ($answer['vote_type'] == 'upvote') ? 'voted' : ''; ?>" href="<?php echo site_url('question/upvote_answer/' . $answer['answer_id'] . '/' . $answer['question_id']); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M8.834.066c.763.087 1.5.295 2.01.884c.505.581.656 1.378.656 2.3c0 .467-.087 1.119-.157 1.637L11.328 5h1.422c.603 0 1.174.085 1.668.333c.508.254.911.679 1.137 1.2c.453.998.438 2.447.188 4.316l-.04.306c-.105.79-.195 1.473-.313 2.033c-.131.63-.315 1.209-.668 1.672C13.97 15.847 12.706 16 11 16c-1.848 0-3.234-.333-4.388-.653c-.165-.045-.323-.09-.475-.133c-.658-.186-1.2-.34-1.725-.415A1.75 1.75 0 0 1 2.75 16h-1A1.75 1.75 0 0 1 0 14.25v-7.5C0 5.784.784 5 1.75 5h1a1.75 1.75 0 0 1 1.514.872c.258-.105.59-.268.918-.508C5.853 4.874 6.5 4.079 6.5 2.75v-.5c0-1.202.994-2.337 2.334-2.184M4.5 13.3c.705.088 1.39.284 2.072.478l.441.125c1.096.305 2.334.598 3.987.598c1.794 0 2.28-.223 2.528-.549c.147-.193.276-.505.394-1.07c.105-.502.188-1.124.295-1.93l.04-.3c.25-1.882.189-2.933-.068-3.497a.921.921 0 0 0-.442-.48c-.208-.104-.52-.174-.997-.174H11c-.686 0-1.295-.577-1.206-1.336c.023-.192.05-.39.076-.586c.065-.488.13-.97.13-1.328c0-.809-.144-1.15-.288-1.316c-.137-.158-.402-.304-1.048-.378C8.357 1.521 8 1.793 8 2.25v.5c0 1.922-.978 3.128-1.933 3.825a5.831 5.831 0 0 1-1.567.81ZM2.75 6.5h-1a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25v-7.5a.25.25 0 0 0-.25-.25" />
                                                </svg>
                                            </a>

                                            <!-- Downvote button -->
                                            <a class="vote-button downvote <?php echo ($answer['vote_type'] == 'downvote') ? 'voted' : ''; ?>" href="<?php echo site_url('question/downvote_answer/' . $answer['answer_id'] . '/' . $answer['question_id']); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                                    <path fill="currentColor" d="M7.083 15.986c-.763-.087-1.499-.295-2.011-.884c-.504-.581-.655-1.378-.655-2.299c0-.468.087-1.12.157-1.638l.015-.112H3.167c-.603 0-1.174-.086-1.669-.334a2.415 2.415 0 0 1-1.136-1.2c-.454-.998-.438-2.447-.188-4.316l.04-.306C.32 4.108.41 3.424.526 2.864c.132-.63.316-1.209.669-1.672C1.947.205 3.211.053 4.917.053c1.848 0 3.234.332 4.388.652l.474.133c.658.187 1.201.341 1.726.415a1.75 1.75 0 0 1 1.662-1.2h1c.966 0 1.75.784 1.75 1.75v7.5a1.75 1.75 0 0 1-1.75 1.75h-1a1.75 1.75 0 0 1-1.514-.872c-.259.105-.59.268-.919.508c-.671.491-1.317 1.285-1.317 2.614v.5c0 1.201-.994 2.336-2.334 2.183m4.334-13.232c-.706-.089-1.39-.284-2.072-.479l-.441-.125c-1.096-.304-2.335-.597-3.987-.597c-1.794 0-2.28.222-2.529.548c-.147.193-.275.505-.393 1.07c-.105.502-.188 1.124-.295 1.93l-.04.3c-.25 1.882-.19 2.933.067 3.497a.923.923 0 0 0 .443.48c.208.104.52.175.997.175h1.75c.685 0 1.295.577 1.205 1.335c-.022.192-.049.39-.075.586c-.066.488-.13.97-.13 1.329c0 .808.144 1.15.288 1.316c.137.157.401.303 1.048.377c.307.035.664-.237.664-.693v-.5c0-1.922.978-3.127 1.932-3.825a5.878 5.878 0 0 1 1.568-.809Zm1.75 6.798h1a.25.25 0 0 0 .25-.25v-7.5a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25" />
                                                </svg>
                                            </a>
											<div class="box-content-details">
												<span>Answered by <strong><?php echo $answer['username']; ?></strong> on <strong><?php echo $answer['created_at']; ?></strong></span>
                                        	</div>
										</div>
                                    <?php endforeach; ?>
                                </div>
                            

                            <!-- Form for Submitting Answers -->
                            <form method="post" action="<?php echo site_url('question/submit_answer/' . $question['question_id']); ?>">
                                <div class="form-group">
                                    <label for="answer_content">Your Answer:</label>
                                    <p class="form-info">Know someone who can answer? Share a link to this question via email, Twitter, or Facebook.</p>
                                    
                                    <div class="editor-container">
                                        <div class="toolbar">
                                            <button type="button" data-command="bold" title="Bold Text <b>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 6H6v6h7a3 3 0 1 0 0-6m2 6H6v6h9a3 3 0 1 0 0-6" />
												</svg>
                                            </button>

                                            <button type="button" data-command="italic" title="Italic Text <i>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6h4m4 0h-4m0 0l-4 12m0 0h4m-4 0H6" />
												</svg>
                                            </button>

                                            <button type="button" data-command="code" title="Code Sample <code>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 7l-5 5l5 5m8 0l5-5l-5-5" />
												</svg>
                                            </button>

											<button type="button" data-command="removeFormatting" title="Remove Code Sample">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path fill="currentColor" d="m19.17 12l-3.88-3.88a.996.996 0 1 1 1.41-1.41l4.59 4.59c.39.39.39 1.02 0 1.41l-2.88 2.88L17 14.17zM2.1 4.93l3.49 3.49l-2.88 2.88a.996.996 0 0 0 0 1.41L7.3 17.3a.996.996 0 1 0 1.41-1.41L4.83 12L7 9.83L19.07 21.9a.996.996 0 1 0 1.41-1.41L3.51 3.51a.996.996 0 0 0-1.41 0c-.39.4-.39 1.03 0 1.42" />
												</svg>
                                            </button>

											<button type="button" data-command="blockquote" title="Blockquote <blockquote>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
													<path fill="currentColor" d="M116 72v88a48.05 48.05 0 0 1-48 48a8 8 0 0 1 0-16a32 32 0 0 0 32-32v-8H40a16 16 0 0 1-16-16V72a16 16 0 0 1 16-16h60a16 16 0 0 1 16 16m100-16h-60a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h60v8a32 32 0 0 1-32 32a8 8 0 0 0 0 16a48.05 48.05 0 0 0 48-48V72a16 16 0 0 0-16-16" />
												</svg>
											</button>

                                            <button type="button" data-command="unorderedList" title="Bulleted List <ul>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path fill="currentColor" d="M8 4h13v2H8zM4.5 6.5a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3m0 7a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3m0 6.9a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3M8 11h13v2H8zm0 7h13v2H8z" />
												</svg>
                                            </button>

                                            <button type="button" data-command="orderedList" title="Numbered List <ol>">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
													<path fill="currentColor" d="M920 760H336c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8m0-568H336c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8m0 284H336c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8M216 712H100c-2.2 0-4 1.8-4 4v34c0 2.2 1.8 4 4 4h72.4v20.5h-35.7c-2.2 0-4 1.8-4 4v34c0 2.2 1.8 4 4 4h35.7V838H100c-2.2 0-4 1.8-4 4v34c0 2.2 1.8 4 4 4h116c2.2 0 4-1.8 4-4V716c0-2.2-1.8-4-4-4M100 188h38v120c0 2.2 1.8 4 4 4h40c2.2 0 4-1.8 4-4V152c0-4.4-3.6-8-8-8h-78c-2.2 0-4 1.8-4 4v36c0 2.2 1.8 4 4 4m116 240H100c-2.2 0-4 1.8-4 4v36c0 2.2 1.8 4 4 4h68.4l-70.3 77.7a8.3 8.3 0 0 0-2.1 5.4V592c0 2.2 1.8 4 4 4h116c2.2 0 4-1.8 4-4v-36c0-2.2-1.8-4-4-4h-68.4l70.3-77.7a8.3 8.3 0 0 0 2.1-5.4V432c0-2.2-1.8-4-4-4" />
												</svg>
											</button>

											<button type="button" data-command="header" title="Header">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
													<path fill="currentColor" d="M3.002 2.499a.5.5 0 1 0-1 0v6a.5.5 0 0 0 1 0v-2.5h3v2.495a.5.5 0 0 0 1 0V2.5a.5.5 0 1 0-1 0V5h-3zm7.613-.486A.5.5 0 0 1 11 2.5v6a.5.5 0 0 1-1 0V3.912a4.574 4.574 0 0 1-.756.525l-.013.007l-.005.002h-.001l-.001.001a.5.5 0 0 1-.449-.894l.004-.002l.023-.012a3.504 3.504 0 0 0 .96-.811a2.53 2.53 0 0 0 .29-.452a.5.5 0 0 1 .563-.263M2 16.498a.5.5 0 0 1 .5-.5h15a.5.5 0 1 1 0 1h-15a.5.5 0 0 1-.5-.5M2.5 12a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z" />
												</svg>
											</button>

											<button type="button" data-command="subHeader" title="Sub Header">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
													<path fill="currentColor" d="M2.502 1.999a.5.5 0 0 1 .5.5v2.5h3V2.5a.5.5 0 0 1 1 0v5.994a.5.5 0 0 1-1 0V6h-3v2.5a.5.5 0 1 1-1 0v-6a.5.5 0 0 1 .5-.5M2.5 15.998a.5.5 0 1 0 0 1h15a.5.5 0 0 0 0-1zM2 12.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1h-15a.5.5 0 0 1-.5-.5m7.452-8.83a1.212 1.212 0 0 1 1.39-.627c.617.183.86.861.479 1.442c-.165.251-.396.485-.681.738c-.1.088-.214.186-.334.287c-.193.165-.4.34-.58.509C9.103 6.6 8.5 7.352 8.5 8.5A.5.5 0 0 0 9 9h3.5a.5.5 0 0 0 0-1H9.562c.126-.483.434-.865.847-1.25c.172-.161.336-.3.508-.446c.123-.104.25-.212.386-.333c.304-.269.616-.574.854-.938c.708-1.08.296-2.555-1.03-2.949c-.964-.286-2.114.175-2.579 1.158a.5.5 0 1 0 .904.428" />
												</svg>
											</button>

											<button id="linkButton" type="button" data-command="link">
												Insert Link
											</button>

											<div id="myModal" class="modal">
												<div class="modal-content">
													<label for="url"><strong>Insert Hyperlink </strong></label></br>
													<input type="text" id="url" />
													<button id="submitUrl">Add Link</button>
													<button id="close">Close</button>
												</div>
											</div>


                                        </div>

                                        <input type="hidden" name="answer_content" id="answer_content" required/>
                                    	<div id="editor" contenteditable="true" class="form-control"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Post your answer</button>
                            </form>
                        </div>
                    </div>

                    <div class="project-box-wrapper">
                        <div class="project-box">
                            <p class="project-box-title">Hot Top Questions</p>
                            <?php foreach ($questions as $question): ?>
                                <div class="box-content-subheader">
                                    <a href="<?php echo site_url('question/view/' . $question['question_id']); ?>" class="questions-link">
                                            <div class="questions-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="#002D62" d="M20 17.17L18.83 16H4V4h16zM20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2" />
                                                </svg>
                                            </div>
                                            <p class="questions-title"><?php echo ($question['title']); ?>
                                        </p>
									</a>									
								</div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>

    </div>
</div>

    <script>

       document.addEventListener('DOMContentLoaded', function () {
            var modeSwitch = document.querySelector('.mode-switch');

            modeSwitch.addEventListener('click', function () {
                document.documentElement.classList.toggle('dark');
                modeSwitch.classList.toggle('active');
            });

            // Add input event listener to update answer_content when the editor content changes
            const editor = document.getElementById('editor');
            editor.addEventListener('input', function() {
                const editorContent = editor.innerHTML;
                document.getElementById('answer_content').value = editorContent;
            });

            // Use the toggleFormatting function for all formatting buttons
            const formattingButtons = document.querySelectorAll('.toolbar button');
            formattingButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    toggleFormatting(button.dataset.command, null, event);
                });
            });

			function toggleFormatting(command, value = null, event) {
				event.stopPropagation();

				const editor = document.getElementById('editor');
				const selection = window.getSelection();
				const range = selection.getRangeAt(0);

				// Check if the user double-clicked on an already formatted element
				const parentNode = range.commonAncestorContainer.parentNode;
				const currentElement = parentNode.nodeName.toLowerCase();

				const modal = document.getElementById('myModal');

				if (currentElement === command) {
					// Remove the formatting
					const selectedText = range.extractContents();
					range.deleteContents();
					range.insertNode(selectedText);
				} else {
					// Apply or remove formatting
					switch (command) {
						case 'bold':
						case 'italic':
							document.execCommand(command, false, value);
							break;

						case 'code':
							// Wrap the selected text in <code> tags
							const codeElement = document.createElement('code');
							codeElement.appendChild(range.extractContents());
							range.deleteContents();
							range.insertNode(codeElement);
							break;

						case 'unorderedList':
						case 'orderedList':
							// Wrap the selected text in <ul> or <ol> tags
							const listElement = document.createElement(command === 'unorderedList' ? 'ul' : 'ol');
							const listItemElement = document.createElement('li');
							listItemElement.appendChild(range.extractContents());
							listElement.appendChild(listItemElement);
							range.deleteContents();
							range.insertNode(listElement);
							break;

						case 'removeFormatting':
							// Remove specific formatting manually
							const formattedElement = range.commonAncestorContainer;
							if (formattedElement.nodeName.toLowerCase() === 'code' ||
								formattedElement.nodeName.toLowerCase() === 'ul' ||
								formattedElement.nodeName.toLowerCase() === 'ol') {
								const selectedText = range.extractContents();
								range.deleteContents();
								range.insertNode(selectedText);
							} else {
								document.execCommand('removeFormat', false, null);
							}
							break;

						case 'header':
							// Create a header using h2
							const headerElement = document.createElement('h2');
							headerElement.appendChild(range.extractContents());
							range.deleteContents();
							range.insertNode(headerElement);
							break;

						case 'subHeader':
							// Create a header using h2
							const subHeaderElement = document.createElement('h3');
							subHeaderElement.appendChild(range.extractContents());
							range.deleteContents();
							range.insertNode(subHeaderElement);
							break;

						case 'blockquote':
							// Create a blockquote
							const blockquoteElement = document.createElement('blockquote');
							blockquoteElement.appendChild(range.extractContents());
							range.deleteContents();
							range.insertNode(blockquoteElement);
							break;

						case 'link':
							// Show the modal for entering a URL
							modal.style.display = 'block';

							// Handle submission inside the modal
							const submitUrlButton = document.getElementById('submitUrl');
							const closeModalButton = document.getElementById('close')[0];

							submitUrlButton.onclick = function() {
								const url = document.getElementById('url').value;
								// Check if a URL is provided
								if (url.trim() !== "") {
									modal.style.display = 'none';
									document.execCommand('createLink', false, url);
								}
							};

							closeModalButton.onclick = function() {
								modal.style.display = 'none';
							};

							break;

						default:
							break;
					}
				}

				// Update the hidden input with the content after applying formatting
				const editorContent = editor.innerHTML;
				document.getElementById('answer_content').value = editorContent;
			}



        });
    </script>

</body>
</html>
