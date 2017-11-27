@extends('layout')
@component('title')
	About MTU Library
@endcomponent
 @section('content')
<div class="container">
    <div class="rules">
        <h1 class="title">Rules of Library</h1>
        <ol>
            <li>All books are allowed to issue everyday according to the following time table except Saturday, Sunday and …..
                <span><p>Open</p><p>Issue time</p>
			</span>
                <span>
				<p>from 9:30am</p>
				<p>from 10:00am</p></span>
                <span><p>to 4:30pm</p>
				<p>to 3:00pm</p></span>
            </li>
            <li>
                <br>
                <ul>
                    <li>Books can be issued as the above time.</li>
                    <li>Students may be allowed to issue books for a week. Users must renew the loan themselves before the due date. However, the loan can be renewed if the item is neither needed elsewhere nor made a request by another user.</li>
                    <li> The allowance of the number of books issue are according to the library card granted for respective academic years.</li>
                </ul>
                Remark: Although books are allowed to be issued for seven days for students and for one month for teachers, text books may be issued with limitation if necessary.
            </li>
            <li>Teachers or students must pay 50 kyats fund for one day if they do not return books on the due date or do not contact the library to renew books.</li>
            <li>
                <br>
                <ul>
                    <li>Users must either procure a replacement copy of equal value or pay 3 times of the current value of compensation for the loss of borrowed items within a period determined by the librarian.</li>
                    <li>
                        In the event of damage of <strong> any  kind</strong> which has occurred during their loan period, users will be liable to compensate for damage or restore the original condition of the book
                    </li>
                </ul>
            </li>
            <li>As long as the borrower does not pay the fines owing and compensation under Rules 3 and 4, the borrower may be ceased to loan items and block the use of other library services.
            </li>
            <li>Users are required to keep the books borrowed from the Library in good physical condition and not to mark, deface, tear the pages or damage the books and may be prohibited or restricted photographs and film or audio recordings of any kind inside the library.</li>
            <li>
                <br>
                <ul>
                    <li>All the borrowed items must be returned to the library 7 days before examination periods at the University and that returned date will be pre-announced by the librarian.
                    </li>
                    <li>After the examinations, the borrowers who have not returned the issued books will be omitted from the exam results.</li>
                </ul>
            </li>
            <li>
                <br>
                <ul>
                    <li>Overcoats, caps, bags, own reading material, folders, briefcases, hand bags and all personal belongings cannot be brought into the library and must be left at the desk near the library entrance before entering the reading room.</li>
                    <li>The library <strong>shall not</strong> be held responsible for loss or damage of personal effects(such as clothing, jewelry, money) left by users in any part of the library.
                    </li>
                </ul>
            </li>
            <li>Books on loan are for the personal study of the borrower only, and must not be passed on to any person, whether entitled to use the Library or not. Only the person named on a library card may use it. The card may not be lent to anyone else, nor used to admit anyone else. Owners of the library card will be responsible for the loss or damage of any books borrowed on the card.</li>
            <li>
                <br>
                <ul>
                    <li>Reference books, restricted books, newspapers, journals and periodicals will be issued for current reading in the library only. Those are issued against Library card or Student ID card or Staff ID card for reading in the library. </li>
                    <li>A person who does not have or carry Library card or Student ID card or Staff ID card may not be permitted for reading reference books, restricted books, newspapers, journals and periodicals.</li>
                </ul>
            </li>
            <li>Smoking, the consumption of food, loud speaking and any other misconduct which is a nuisance to other users is forbidden in any part of the Library. Drinking is allowed in designated area only.
            </li>
            <li>Users are obliged to follow the orders and directions of library staff when a library staff asks for Library card or Student ID card in any particular case.</li>
            <li>Any research students may not be allowed to make a library card. Any research students who want to borrow books from library may be permitted with national identity card or student ID card for a week.</li>
        </ol>
    </div>
</div>
<div class="mission_vision">
    <div class="mission">
        <div class="columns">
            <div class="column is-2">
                <img src="{{ asset('mission.png') }}" class="icon">
            </div>
            <div class="column">
                <h1 class="title" style="color: white;">Mission &amp; Objectives</h1> To deliver books related to Engineering, magazines, CD-ROMs and DVDs to teachers and students of Mandalay Technological University
            </div>
        </div>
    </div>
    <div class="vision">
        <div class="columns">
            <div class="column is-2"></div>
            <div class="column">
                <h1 class="title">Vision</h1> To give the best service over our existing system by changing traditional library system to online library system.
            </div>
            <div class="column is-2">
                <img src="{{ asset('vision.png') }}" class="icon">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="staff-info">
        <h1 class="title" style="text-align: center;">Staff Info</h1>
        <div class="staff-cards">
            <div class="card">
                <p>Name: Miss Saeki</p>
                <p>Job title: Head of Librarian</p>
                <p>Email: misssaeki@kamuralib.com</p>
            </div>
            <div class="card">
                <p>Name: Oshima</p>
                <p>Job title: Front Desk</p>
                <p>Email: oshima@kamuralib.com</p>
            </div>
        </div>
        <div class="staff-cards">
            <div class="card">
                <p>Name: Miss Saeki</p>
                <p>Job title: Head of Librarian</p>
                <p>Email: misssaeki@kamuralib.com</p>
            </div>
            <div class="card">
                <p>Name: Oshima</p>
                <p>Job title: Front Desk</p>
                <p>Email: oshima@kamuralib.com</p>
            </div>
        </div>
        <div class="staff-cards">
            <div class="card">
                <p>Name: Miss Saeki</p>
                <p>Job title: Head of Librarian</p>
                <p>Email: misssaeki@kamuralib.com</p>
            </div>
            <div class="card">
                <p>Name: Oshima</p>
                <p>Job title: Front Desk</p>
                <p>Email: oshima@kamuralib.com</p>
            </div>
        </div>
    </div>
</div>
@endsection @section('style')
<style type="text/css">
li span {
    display: flex;
    justify-content: space-around;
}

ul {
    padding: 1em;
    list-style: disc;
}

ol>li {
    padding: 1em;
}

.icon {
    height: 150px;
    width: auto;
    display: block;
    margin: auto;
}

.mission {
    background-color: #757575;
    color: white;
}

.vision .column {
    display: block;
    text-align: right;
}

.vision {
    background-color: #eeeeee;
}

.mission_vision {
    margin: 2em 0;
    font-size: 1.3em;
}

.staff-cards {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
}

.staff-cards .card {
    padding: 2em 6em;
}
.staff-info h1.title{
	margin: 1em 0;
	text-decoration: underline !important;
}
</style>
@endsection