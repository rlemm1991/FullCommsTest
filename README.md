<h1>Full Comms Technical Test"
<hr>

<h3>Setup</h3>

I've used Vagrant Laravel Homestead as my platform so replication will required;

<ul>
<li>PHP 7.X </li>
<li>MySql </li>
<li>Nginx </li>
</ul>

Run

<code>Composer install</code>

<code>npm install</code>

Just to ensure everything is installed.


<h3>Migrations</h3>

Issue i kept running into is the base table not existing.

I did write a command <code>php artisan database:create</code>
which should of make the schema 'fullcomms' however if it doesn't play ball this will need to be done manually.

Run <code>php artisan migrate</code>

This should create the table for recording the contact requests.


<h4>Notes</h4>
There is a few things i want to cover just in case questions come up.


Mailables i would of hooked into a queue for sending out as that is the norm but didnt want to waste time.

Logic is a little out place in areas, specially naming conventions, this was just to get something done quickly and doesn't usually reflect my work.

Seeding i left out as i wanted to hand it in before 4pm.
