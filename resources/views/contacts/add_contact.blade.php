@extends('layouts.app')

@section('title')
    <h2>Add New Contact</h2>
@endsection()

@section('content')
<div id="user">

@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <form action="/add_contact" method="POST">
        <ul id="newContactsList" class="list-group">
                @csrf
                <li id="newContact" class="removeCont row justify-content-between pb-2" >
                    <ul id="userList" class="p-0 col-md-12 list-group">
                        <li class="userFields list-group-item d-flex form-row m-0 py-3">
                            <div class="col-md-3">
                                <span>Firstname</span>
                                <input type="text" name="firstname[]" class="form-input" autocomplete="off" required>
                            </div>

                            <div class="col-md-3">
                                <span>Lastname</span>
                                <input type="text" name="lastname[]" autocomplete="off" required>
                            </div>
                            
                            <div class="col-md-3">
                                <span>Phone Type</span>
                                <select name="phoneType[]">
                                    <option value="1">Mobile</option>
                                    <option value="2">Home</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <span>Number</span>
                                <input type="text" name="number[]" autocomplete="off" required>
                            </div>
                            
                        </li>
                    </ul>
                </li>
        </ul>
        <div class="mt-2">
            <button data-bind="click: addUser" class="btn btn-primary mr-1">Add another user</button>
            <button data-bind="click: removeSelected" class="btn btn-danger mr-1">Remove contacts</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection

@section('js-inline')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/knockout.js') }}"></script>
    <script type="text/javascript">

        var ViewModel = function(){
            this.addUser = function() {
                let ul = document.getElementById("newContactsList");
                let li = document.createElement("li");
                let fields = '<ul id="userList" class="p-0 col-md-12 list-group">' +
                                '<li class="userFields list-group-item d-flex form-row m-0 py-3">'+
                                    '<div class="col-md-3">' +
                                        '<span>Firstname</span> ' +
                                        '<input type="text" name="firstname[]" class="form-input" autocomplete="off" required>' +
                                    '</div>' +
                                    '<div class="col-md-3">' +
                                        '<span>Lastname</span> ' +
                                        '<input type="text" name="lastname[]" autocomplete="off" required>' +
                                    '</div>' +
                                    '<div class="col-md-3">' +
                                        '<span>Phone Type</span> ' +
                                        '<select name="phoneType[]">' +
                                            '<option value="1">Mobile</option>' +
                                            '<option value="2">Home</option>' +
                                        '</select>' +
                                    '</div>' +
                                    '<div class="col-md-3">' +
                                        '<span>Number</span> ' +
                                        '<input type="text" name="number[]" autocomplete="off" required>' +
                                    '</div>' +
                                '</li>' +
                             '</ul>';

                li.setAttribute("id","newContact");
                li.setAttribute("class", "removeCont row justify-content-between pb-2");
                li.innerHTML += fields;
                ul.appendChild(li);
            };

            this.removeSelected = function() {
                var elements = document.getElementsByClassName('removeCont')
                    while (elements.length > 0) {
                        elements[0].outerHTML=''
                    }  
            };
        }
        ko.applyBindings(new ViewModel());
    </script>
@endsection
