<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 bg-primary text-white mb-4">
                <h1>All Posts</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-8">
                <a href="/addpost" class="btn btn-sm btn-primary">Add New</a>
                <button class="btn btn-sm btn-danger" id="logoutBtn">Log Out</button>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div id="postContainer">
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        document.querySelector("#logoutBtn").addEventListener("click",function(){
            const token = localStorage.getItem('api_token');
            fetch('/api/logout',{
                method:'POST',
                headers:{
                    'Authorization':`Bearer ${token}`,

                }
            })
            .then(response=>response.json())
            .then(data=>{
                console.log(data);
                window.location.href = 'api/signin';
            });
        });
        function loadData(){
            const token = localStorage.getItem('api_token');
            fetch('/api/posts',{
                method:'GET',
                headers:{
                    'Authorization':`Bearer ${token}`
                }
            })
            .then(response=>response.json())
            .then(data=>{
                console.log(data.data.posts);
                const postContainer =   document.querySelector("#postContainer");
                const allpost      =   data.data.posts;
                var tabledata = `<table class="table table-bordered">
                        <tr class="table-dark">
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>View</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>`;
                        allpost.forEach(post => {
                            tabledata +=`<tr>
                            <td>
                                <img src="" alt="" width="150px">
                            </td>
                            <td>
                                <h6>${{  post.title }}</h6>
                            </td>
                            <td>
                                <p>${{  post.description }}</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary">View</button>
                            </td>
                            <td>
                                <button type="button">Update</button>
                            </td>
                            <td>
                                <button onclick="deletepost()">Delete</button>
                            </td>
                        </tr>`;
                        });
                        tabledata+ = `</table>`;
                        postContainer.innerHtml = tabledata;
            });
        }
        loadData();
    </script>
</body>
</html>