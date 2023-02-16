
@csrf

    <div class="row">
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{$product->image}}">
                    <span class="card-title"></span>
                </div>
                <div class="card-content">
                    <div>ID: </div>
                    <p>Price: </p>
                    <p>Description: </p>
                    <p>Categories: </p>
                    <p>Creation date: </p>
                    <p>Last updated: </p>
                </div>
                <div class="card-action">
                    <a> data-tooltip="Redaguoti"
                       class="tooltipped waves-effect waves-light green btn-small">
                        <i class="tiny material-icons">edit</i>
                    </a>

                        <button type="submit"data-tooltip="Šalinti"
                                class="tooltipped waves-effect waves-light red btn-small">
                            <i class="tiny material-icons">delete</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
