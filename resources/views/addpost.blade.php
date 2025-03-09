<script>
    addform.onsubmit    =   async (e) =>{
        e.preventDefault();
        const token = localStorage.getItem('api_token');
        const title = document.querySelector('#title').value;
        const description   =   document.querySelector('#description').value;
        const image =   document.querySelector("#image").firles[0];
        var formData    =   new FormData();
        formData.append('title',title);
        formData.append('description',description);
        formData.append('image',image);
        let response = await fetch('/api/posts',{
            method:'POST',
            body : formData,
            headers:{
                'Authorization':`Bearer ${token}`,

            }
        })
        .then(response=>response.json())
        .then(data=>{
            console.log(data);
            //window.location.href = 'allposts';
        });
    }
</script>