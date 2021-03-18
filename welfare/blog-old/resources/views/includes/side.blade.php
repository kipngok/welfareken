<ul class="sidebar-menu" style="list-style: none; padding: 0px;">
      <li><a href="/home" class="navio"> Dashboard</a></li>
      <li><a href="/student" class="navio"> Students</a></li>
      <li><a href="/invoice" class="navio"> Invoices</a></li>
      <li><a href="/payment" class="navio"> Payments</a></li>
      <li><a href="/sms" class="navio"> SMS</a></li>
      <li><a href="/school" class="navio">School</a></li>
      @if(Auth::user()->is_admin==1)
      <li><a href="/user" class="navio">Users</a></li>
      @endif
  </ul>