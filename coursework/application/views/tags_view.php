<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags</title>
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
	
	.search-wrapper {
		border-radius: 20px;
		background-color: var(--search-area-bg);
		padding-right: 12px;
		height: 40px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		width: 100%;
		max-width: 480px;
		color: var(--light-font);
		box-shadow: 0 2px 6px 0 rgba(136, 148, 171, .2), 0 24px 20px -24px rgba(71, 82, 107, .1);
		overflow: hidden;
	}

	.dark .search-wrapper {
		box-shadow: none;
	}

	.search-input {
		border: none;
		outline: none;
		height: 100%;
		padding: 0px 20px;
		font-size: 16px;
		background-color: var(--search-area-bg);
		color: var(--main-color);
	}

	.feather-search {
		margin-left: 230px; /* Automatically calculate margin to place element on right */
	}

	
	.search-input:placeholder {
		color: var(--main-color);
		opacity: 0.6;
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
	
	.notification-btn {
		color: var(--main-color);
		padding: 0;
		border: 0;
		background-color: transparent;
		height: 32px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.profile-btn {
		padding: 0;
		border: 0;
		background-color: transparent;
		display: flex;
		align-items: center;
		padding-left: 12px;
		border-left: 2px solid #ddd;
	}
	
	.profile-btn img {
		width: 32px;
		height: 32px;
		object-fit: cover;
		border-radius: 50%;
		margin-right: 4px;
	}
	
	.profile-btn span {
		color: var(--main-color);
		font-size: 16px;
		line-height: 24px;
		font-weight: 700;
	}
	
	.page-content {
		flex: 1;
		width: 100%;
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
		justify-content: space-between;
		align-items: center;
		padding-bottom: 32px;
	}
	
	.projects-section-line p {
		font-size: 24px;
		line-height: 32px;
		font-weight: 700;
		opacity: 0.9;
		margin: 0;
		color: var(--main-color);
	}
	
	.projects-status {
		display: flex;
	}
	
	.view-actions {
		display: flex;
		align-items: center;
		margin-left: auto;
	}
	
	.view-btn {
		width: 36px;
		height: 36px;
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 6px;
		border-radius: 4px;
		background-color: transparent;
		border: none;
		color: var(--main-color);
		margin-left: 8px;
		transition: 0.2s;
	}
	
	.view-btn.active {
		background-color: var(--link-color-active-bg);
		color: var(--link-color-active);
	}
	
	.view-btn:not(.active):hover {
		background-color: var(--link-color-hover);
		color: var(--link-color-active);
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
		width: 33.3%;
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
		border-radius: 10px;
		padding: 14px;
		background-color: var(--main-color-card);
	}

	.project-box-content-header a{
		text-decoration:  none;
		color: #000;
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
	
	.project-box-wrapper {
		padding: 8px;
		transition: 0.2s;
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
		margin-top: 10px;
		font-size: 12px;
		line-height: 15px;
		opacity: 0.7;
		text-align: right;
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

	.pagination-container {
        display: flex;
        align-items: center;
        margin-top: 16px;
        margin-left: auto;
    }

    .pagination-btn {
        background-color: var(--button-bg);
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 8px;
    }

    .page-number {
        margin: 0 16px;
        font-size: 16px;
        color: var(--main-color);
        font-weight: 700;
    }

	.project-tags {
		display: flex;
		flex-wrap: wrap;
	}

	.tag-link {
		text-decoration: none;
	}

	.tag {
		display: inline-block;
		background-color: #93e5fa;
		color: #000;
		padding: 8px 12px;
		border-radius: 20px;
		margin-right: 8px;
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

		.view-btn {
			width: 24px;
			height: 24px;
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

		.box-content-header a{
			text-decoration: none;
		}
		
		.box-content-subheader {
			font-size: 12px;
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
				
				<a href="<?php echo site_url('dashboard/questions'); ?>" class="app-sidebar-link" title="All questions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M13.037 20.863c0 1.302 1.145 2.36 2.555 2.36c1.41 0 2.556-1.058 2.556-2.37V19.15c0-.111.073-.209.18-.242C21.676 17.85 24 14.919 24 11.562v-1.254c0-4.239-3.69-7.773-8.227-7.861c-2.28-.05-4.432.744-6.065 2.212c-1.622 1.469-2.523 3.447-2.523 5.552c0 1.311 1.155 2.369 2.566 2.369c1.41 0 2.555-1.058 2.555-2.36c0-.822.35-1.596.986-2.173a3.394 3.394 0 0 1 2.375-.872c1.78.04 3.223 1.45 3.223 3.143v1.244c0 1.468-1.124 2.731-2.683 2.996c-1.834.313-3.17 1.791-3.17 3.514zM15.5 30a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5" />
                    </svg>
				</a>

                <a href="<?php echo site_url('tag/list_tags'); ?>" class="app-sidebar-link active" title="Tags">
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

                <a href="<?php echo site_url('helpAbout/index'); ?>" class="app-sidebar-link" title="Profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linejoin="round" d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                            <circle cx="12" cy="7" r="3" />
                        </g>
                    </svg>
				</a>
        
				<a href="<?php echo site_url('helpAbout/index'); ?>" class="app-sidebar-link" title="About">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 9h2V7h-2m1 13c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m-1 15h2v-6h-2z" />
                    </svg>
				</a>
			</div>
			
			<div class="projects-section">
                <div class="projects-section-line">
                    <p>TAGS</p>
                </div>

                <div class="project-boxes jsGridView">
					<div class="project-tags">
						<?php foreach ($tags as $tag): ?>
							<a class="tag-link" href="<?php echo site_url('tag/view_questions_by_tag/' . $tag['tag_id']); ?>">
								<span class="tag"><?php echo $tag['tag_name']; ?></span>
							</a>
						<?php endforeach; ?>
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
    });
</script>


</body>
</html>