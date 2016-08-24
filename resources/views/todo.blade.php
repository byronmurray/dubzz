@extends('../layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">To do List</div>

        <div class="panel-body">

            <h2>Admin / Dashboard</h2>
            <ul>
                <li>make latest activity</li>
                    <ul>
                        <li>Table</li>
                        <li>Model</li>
                        <li>View</li>
                        <li>Relationships</li>
                    </ul>
                <li><s>Make Tags Views</s></li>
                <li><s>Make team view</s></li>
                <li>Make Processes View</li>
                <li>Covert All forms into blade sytax</li>
                <li>Use route names for links</li>
            </ul>

            <h2>Tags</h2>
            <s>All this will be inside task controller</s> <span class="red">Nah made separate controller</span>
            <ul>
                <li><s>Create New</s></li>
                <li>Edit</li>
                <li><s>Delete</s></li>
                <li><s>Covert All forms into blade sytax</s></li>
                <li>Use route names for links</li>
            </ul>

            <h2>Task Revisions</h2>
            <ul>
                <li>Tags dont need aproval, dont make a revision if just tags are updated, need to do a check.</li>
                <li><s>Add Tags</s></li>
                <li>need to find any other revisions with a status of active and set to version for the task-revision</li>
                <li>Finish Buttons</li>
                <li>Finish off views</li>
                <li>Tidy up Controllers / Make into one controller, think about what you are trying to do here</li>
                <li>Rename table and model to TasksRevisions</li>
                <li>Covert All forms into blade sytax</li>
                <li>Use route names for links</li>
                <li>Redirects/returns</li>
                <li>Flash Messaging</li>
            </ul>

            <h2>Tasks</h2>
            <ul>
                <li>Covert All forms into blade sytax</li>
                <li>Use route names for links</li>
                <li>Select 2 select box</li>
            </ul>

            <h2>Processes</h2>
            <ul>
                <li>DRY</li>
                <li><s>Redo all this, its a mess! Have one modal for all and handle with vars</s></li>
                <li>Same for forms, on for all and handle with vars</li>
                <li>Redo Redirects/returns</li>
                <li>Flash Messaging</li>
                <li>Covert All forms into blade sytax</li>
                <li>Use route names for links</li>
            </ul>

            <h2>Styling / Performance</h2>
            <ul>
                <li>Pull in style sheets, CDNs</li>
                <li>Compile down into one CSS and Script</li>
                <li>Minimize HTTP requests</li>
                <li>Test table setup, queries and indexes on Database</li>
            </ul>

            <h2>Auth</h2>
            <ul>
                <li>Write Middleware for user roles</li>
            </ul>

            <h2>Users</h2>
            <ul>
                <li>User tabs in user drop down</li>
                    <ul>
                        <li>profile</li>
                        <li>Jobs</li>
                        <li>Alerts</li>
                        <li>Notifications</li>
                    </ul>
                <li>Set up user roles and permissions</li>
            </ul>
       

        </div>
    </div>
</div>

@endsection