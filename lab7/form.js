document.addEventListener("DOMContentLoaded", () => {
	const postData =
		{
			title: '',
			subtitle: '',
			authorName: '',
      		authorImage: '',
			postImage: '',
			postcardImage: '',
			date: '',
			content: '',
		}
	
	let imgPost;
	let imgPostCard;
	let imgAuthor;
	
	document.getElementById("upload-image-author").classList.add('hidden');
	document.getElementById("remove-image-author").classList.add('hidden');

	document.getElementById("upload-image-preview").classList.add('hidden');
	document.getElementById("remove-image-preview").classList.add('hidden');

	document.getElementById("upload-image-postcard").classList.add('hidden');
	document.getElementById("remove-image-postcard").classList.add('hidden');

	document.getElementById('error_alarm').style.display = 'none'
	document.getElementById('success_alarm').style.display = 'none'

	//обработка кнопка на фото автора
	document.querySelector('.image__button_remove-author').addEventListener('click', function() {
		document.getElementById("uploadImage-author").remove(imgAuthor);
		document.getElementById("upload-image-author").classList.add('hidden');
		document.getElementById("remove-image-author").classList.add('hidden');
		document.querySelector('.preview-section__author-image').style.backgroundImage = 'none'
		document.getElementById("upload_button").classList.remove('hidden');
	  })

	document.querySelector('.container_author-image_upload').addEventListener('click', function() {
		document.getElementById("uploadImage-author").remove(imgAuthor);
	  })


	//обработка кнопок на фото preview
	document.querySelector('.image__button_remove-preview').addEventListener('click', function() {
		document.getElementById("uploadImage-post").remove(imgPost);
		document.getElementById("upload-image-preview").classList.add('hidden');
		document.getElementById("remove-image-preview").classList.add('hidden');
		document.querySelector('.preview-section__post-image').style.backgroundImage = 'none'
		document.getElementById("undercaption-big").classList.remove('hidden');
		
	  })

	document.querySelector('.upload_image-preview').addEventListener('click', function() {
		document.getElementById("uploadImage-post").remove(imgPost);
	  })

	//обработка кнопок на фото postcard
	document.querySelector('.image__button_remove-postcard').addEventListener('click', function() {
		document.getElementById("uploadImage-postcard").remove(imgPostCard);
		
		document.getElementById("upload-image-postcard").classList.add('hidden');
		document.getElementById("remove-image-postcard").classList.add('hidden');
		document.querySelector('.preview-section__post_card-image').style.backgroundImage = 'none'

		document.getElementById("undercaption-small").classList.remove('hidden');
	  })

	  document.querySelector('.upload_image-postcard').addEventListener('click', function() {
		document.getElementById("uploadImage-postcard").remove(imgPostCard);
	  })

	const postForm = document.getElementById('form');
	const titleInput = document.getElementById('title_input');
	const subtitleInput = document.getElementById('subtitle_input');
	const authorInput = document.getElementById('author_input');
	const postImageInput = document.getElementById('post_image_input');
  	const authorImageInput = document.getElementById('author_image_input');
	const postCardImageInput = document.getElementById('post_card_image_input');
	const postDateInput = document.getElementById('publish_date_input');
	const contentInput = document.getElementById('content_input');

	function changeFormat(dateWeGet) {
		let dateArray = dateWeGet.split('-')
		let newFormat = `${dateArray[1]}/${dateArray[2]}/${dateArray[0]}`

		return newFormat
	};

	function onTitleInputChange(event) {
		postData.title = event.target.value;
		const postPreviewTitle = document.querySelector('.preview-section__title')
		postPreviewTitle.innerText = postData.title;

		const postCardPreviewTitle = document.querySelector('.recent__text-title')
		postCardPreviewTitle.innerText = postData.title;
	}
	function onAuthorInputChange(event) {
		postData.authorName = event.target.value;
		const postPreviewAuthor = document.querySelector('.preview-section__author')
		postPreviewAuthor.innerText = postData.authorName;
	}
	function onSubtitleInputChange(event) {
		postData.subtitle = event.target.value;
		const postPreviewSubtitle = document.querySelector('.preview-section__subtitle')
		postPreviewSubtitle.innerText = postData.subtitle;

		const postCardPreviewSubtitle = document.querySelector('.recent__text-subtitle')
		postCardPreviewSubtitle.innerText = postData.subtitle;
	}

	function onDateInputChange(event) {
		postData.date = changeFormat(event.target.value);
		const postPreviewDate = document.querySelector('.recent__author-data')
		postPreviewDate.innerText = postData.date;
	}

	function onContentInputChange(event) {
		postData.content = event.target.value;
	}

	function onPostImageInputChange(event) {
		imgPost = document.createElement('img');
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.postImage = result;
			const postPreviewImage = document.querySelector('.preview-section__post-image')
			postPreviewImage.style.backgroundImage = `url(${postData.postImage})`
			const uploadPostImage = document.querySelector('.data__image_url-icon_big');

			imgPost.src = `${postData.postImage}`;
			imgPost.className = 'uploadImage-post';
			imgPost.id = 'uploadImage-post';
			uploadPostImage.append(imgPost);
			document.getElementById("undercaption-big").classList.add('hidden');
		});

		document.getElementById("upload-image-preview").classList.remove('hidden');
		document.getElementById("remove-image-preview").classList.remove('hidden');
	}

	function onPostCardImageInputChange(event) {
		imgPostCard = document.createElement('img');
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.postcardImage = result;
			const postCardPreviewImage = document.querySelector('.preview-section__post_card-image')
    		postCardPreviewImage.style.backgroundImage = `url(${postData.postcardImage})`
			const uploadPostCardImage = document.querySelector('.data__image_url-icon_small');

			imgPostCard.src = `${postData.postcardImage}`;
			imgPostCard.className = 'uploadImage-postcard';
			imgPostCard.id = 'uploadImage-postcard';
			uploadPostCardImage.append(imgPostCard);
			document.getElementById("undercaption-small").classList.add('hidden');
		});

		document.getElementById("upload-image-postcard").classList.remove('hidden');
		document.getElementById("remove-image-postcard").classList.remove('hidden');
	}

  	function onAuthorImageInputChange(event) {
		imgAuthor = document.createElement('img');
		const file = event.target.files[0];
		readFileAsBase64(file, (result) => {
			postData.authorImage = result;
			const postPreviewAuthorImage = document.querySelector('.preview-section__author-image')
			postPreviewAuthorImage.style.backgroundImage = `url(${postData.authorImage})`
			const uploadAuthorImage = document.querySelector('.data__author_url-icon');

			imgAuthor.src = `${postData.authorImage}`;
			imgAuthor.className = 'uploadImage-author';
			imgAuthor.id = 'uploadImage-author';
			uploadAuthorImage.append(imgAuthor);
			document.getElementById("upload_button").style.display = 'none';
		});

		document.getElementById("upload-image-author").classList.remove('hidden');
		document.getElementById("remove-image-author").classList.remove('hidden');
	}

	function readFileAsBase64 (file, onload) {
		const reader = new FileReader();
		reader.addEventListener( 
      "load", 
      () => {
			onload(reader.result);
		},
     false, 
    );
		reader.readAsDataURL(file);
	}

  document.querySelectorAll('.title_input').forEach(el => {
    el.addEventListener('blur', () => {
        if (el.value.trim().length === 0) {
            showError(el, "Title is required");
        }
    });
});

document.querySelectorAll('.subtitle_input').forEach(el => {
    el.addEventListener('blur', () => {
        if (el.value.trim().length === 0) {
            showError(el, "Subtitle is required");
        }
    });
});

document.querySelectorAll('.data__author').forEach(el => {
    el.addEventListener('blur', () => {
        if (el.value.trim().length === 0) {
            showErrorAuthor(el, "Author Name is required");
        }
		else if (el.value[0] === el.value[0].toLowerCase()) {
            showErrorAuthor(el, "Author Name first letter should be uppercase");
		}
    });
});

function showErrorAuthor(field, errText) {
    if (field.nextElementSibling 
        && field.nextElementSibling.textContent === errText) {
        return;
    }
	field.classList.add('author-error');

    const err = document.createElement('span');
    field.after(err);
    err.classList.add('error');
    err.textContent = errText;
    
    hideErr(field, err, 'author-error');
}

function showError(field, errText) {
    if (field.nextElementSibling 
        && field.nextElementSibling.textContent === errText) {
        return;
    }
    field.classList.add('field-error');
    const err = document.createElement('span');
    field.after(err);
    err.classList.add('error');
    err.textContent = errText;
    hideErr(field, err, 'field-error');
}

function hideErr(field, err, nameOfClass) {
    field.addEventListener('input', () => {
        field.classList.remove(nameOfClass);
        err.remove();
    });
}

	function initEventListener () {

		titleInput.addEventListener('input', onTitleInputChange);
		subtitleInput.addEventListener('input', onSubtitleInputChange)
		authorInput.addEventListener('input', onAuthorInputChange)
		postDateInput.addEventListener('input', onDateInputChange);
		postImageInput.addEventListener('change', onPostImageInputChange)
    	authorImageInput.addEventListener('change', onAuthorImageInputChange)
		postCardImageInput.addEventListener('change', onPostCardImageInputChange)
		contentInput.addEventListener('input', onContentInputChange)

		postForm.addEventListener('submit', (e) => {
			e.preventDefault();

			if ((postData.title.trim().length) && (postData.subtitle.trim().length) 
				&& (postData.authorName.trim().length) 
				&& (postData.authorName.trim()[0] === postData.authorName.trim()[0].toUpperCase()) 
				&& (postData.postImage.length) && (postData.postcardImage.length)) {

				document.getElementById('success_alarm').style.display = 'flex'
				document.getElementById('error_alarm').style.display = 'none'
				console.log(postData);
				console.log(new Date(postData.date));

				fetch("http://localhost:8001/api", {
				method: "POST",
				body: JSON.stringify({
				title: postData.title,
				subtitle: postData.subtitle,
				content: postData.content,
				author: postData.authorName,
				featured: 0,
				publish_date: new Date(postData.date),
				author_url: postData.authorImage,
				image_post_url: postData.postImage,
				image_postcard_url: postData.postcardImage,
				}),
				headers: {
					"Content-type": "application/json; charset=UTF-8"
				}
				})
				.then((response) => response.json())
				.then((json) => console.log(json));
			}
			else {
			if (!(postData.title.trim().length)) {
				document.querySelectorAll('.title_input').forEach(el => {
						showError(el, "Title is required");
				});
					}
			else if (!(postData.subtitle.trim().length)) {
				document.querySelectorAll('.subtitle_input').forEach(el => {
					showError(el, "Subtitle is required");
				});
			}
			else if (!(postData.authorName.trim().length)) {
				document.querySelectorAll('.data__author').forEach(el => {
					showError(el, "Author Name is required");
				});
			}
			else if (!(postData.authorName[0] === postData.authorName[0].toUpperCase())) {
				document.querySelectorAll('.data__author').forEach(el => {
					showError(el, "Author Name first letter should be uppercase");
				});
			}
			else if (!(postData.postImage.trim().length)) {
				document.querySelectorAll('.data__image_url-icon_big').forEach(el => {
					showError(el, "Hero Image is required");
				});
			}
			else if (!(postData.postcardImage.trim().length)) {
				document.querySelectorAll('.data__image_url-icon_small').forEach(el => {
					showError(el, "Hero Image is required");
				});
			}

				document.getElementById('error_alarm').style.display = 'flex'
				document.getElementById('success_alarm').style.display = 'none'
			}	
		});
		
	}

	initEventListener();

});
