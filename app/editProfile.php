<html>
<head
<link rel="stylesheet" type="text/css" href="stylelogin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
    .upload label{
        background-color: #7F9CCB;
        position:absolute;
        padding: 5px 10px;
        border-radius: 5px;
        border: 1px ridge black;
        font-size: 0.8rem;
        height: auto;
        cursor: pointer;
        margin-right: auto;
        margin-left: auto;
    }
</style>
</head>
<body>
<div style="text-align: center;">
    <div class="header">
        <h1>User Settings</h1>
    </div>
    <form method="post" enctype="multipart/form-data" action="profileView.php"> <!-- Action = "database.php" -->
        <div>
            <label for="profileName"><b>Name</b></label>
            <input type="text" placeholder="Name" name="profileName" id = "profileName" >
        </div>
        <div>
            <label for="profileEmail"><b>Email</b></label>
            <input type="text" placeholder="Email" name="profileEmail" id = "profileEmail" >
        </div>
        <div class="upload">
            <label for="profileUpload">Edit Profile Picture</label>
            <input type="file" id="profileUpload" name="profileUpload" accept=".jpg, .jpeg, .png">
        </div>
        <div class="preview">
            <p>No files currently selected for upload</p>
        </div>
        <div class="security">
            <b>Security and Privacy</b><br>
            <label for="showRankings">Show my leaderboard rankings</label>
            <input type="checkbox" id="showRankings" name="showRankings" value="showRankings"><br>
            <label for="showStreak">Show my streak</label>
            <input type="checkbox" id="showStreak" name="showStreak" value="showStreak"><br>
        </div>
        <div class="social">
            <br><b>Link your social media</b><br>
            <label for="linkFacebook"><b>Facebook</b></label>
            <i class="fab fa-facebook-f" style="color:blue"></i>
            <input type="text" name="linkFacebook" id = "linkFacebook" ><br>
            <label for="linkTwitter"><b>Twitter</b></label>
            <i class="fab fa-twitter" style="color:lightskyblue"></i>
            <input type="text" name="linkTwitter" id = "linkTwitter" ><br>
            <label for="linkInstagram"><b>Instagram</b></label>
            <i class="fab fa-instagram" style="color:#FC94AF"></i>
            <input type="text" name="linkInstagram" id = "linkInstagram" ><br>
        </div>
        <div class="container">
            <a type="submit" name="submitPost" value="submitPost">
                <button>Submit Changes</button>
            </a>
        </div>
    </form>

</div>


<script>
    const input = document.getElementById('profileUpload');
    const preview = document.querySelector('.preview');

    input.style.opacity = 0;

    input.addEventListener('change', updateImageDisplay);

    function updateImageDisplay() {
        while(preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const curFiles = input.files;
        if(curFiles.length === 0) {
            const para = document.createElement('p');
            para.textContent = 'No files currently selected for upload';
            preview.appendChild(para);
        } else {
            const list = document.createElement('ol');
            preview.appendChild(list);

            for(const file of curFiles) {
                const listItem = document.createElement('li');
                const para = document.createElement('p');

                if(validFileType(file)) {
                    para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
                    const image = document.createElement('img');
                    image.src = URL.createObjectURL(file);

                    listItem.appendChild(image);
                    listItem.appendChild(para);
                } else {
                    para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
                    listItem.appendChild(para);
                }

                list.appendChild(listItem);
            }
        }
    }

    // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
        'image/jpg',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ];

    function validFileType(file) {
        return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
        if(number < 1024) {
            return number + 'bytes';
        } else if(number > 1024 && number < 1048576) {
            return (number/1024).toFixed(1) + 'KB';
        } else if(number > 1048576) {
            return (number/1048576).toFixed(1) + 'MB';
        }
    }
</script>
</body>
</html>
