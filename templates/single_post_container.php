<!--START OF SINGLE POST CONTAINER-->

<div class="row">
    <div class="col-12 single-post-details">
        <div class="row">
            <div class="col-2">
                <img src="" alt="user profile">
                <p>@<span>username</span></p>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Ask title</h5>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium, nisi facilis? Voluptatem recusandae eum consequatur placeat inventore ut accusamus, hic reiciendis suscipit cum minus. Nobis doloribus incidunt culpa ipsum laborum.</p>
                        <div class="row lower-half">
                            <div class="col-11 meta-info">
                                <a href="#" class="card-link posted-by">@<span>username</span></a>
                                <small class="card-link date-time-asks">@<span class="time-asks">00:00</span> <span class="date-asks">00/00/00</span></small>
                            </div>
                            <div class="col like">
                                <span class="like-btn"><i class="bi bi-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 single-post-add-comment">
        <div class="form-floating">
            <div class="addComment">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 200px"></textarea>
                <button
                    type="button"
                    class="btn btn-primary">
                    reply <i class="bi bi-send-fill"></i>
                </button>

            </div>
        </div>

    </div>
    <div class="col-12 single-post-comments">
        <?php include 'comment_card.php'; ?>
    </div>
</div>

<!--END OF SINGLE POST CONTAINER-->