<?

include(URI.'lib/3rd/discord/link/permission-functions.php');

// print_r($_SESSION);


if (checkDiscordPermissionHtml()){
?>
<section class="container">
	<div class="row padding-top">
		<div class="main col-md-12">
<div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Position</th>
              <th>Username</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Johnathan</td>
              <td>Doe</td>
              <td>CEO, Founder</td>
              <td>@johny</td>
              <td>+3 555 68 70</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Anna</td>
              <td>Cabana</td>
              <td>Designer</td>
              <td>@cabana</td>
              <td>+3 434 65 93</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Kale</td>
              <td>Thornton</td>
              <td>Developer</td>
              <td>@thornton</td>
              <td>+3 285 42 88</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Jane</td>
              <td>Birkins</td>
              <td>Support</td>
              <td>@birkins</td>
              <td>+3 774 28 50</td>
            </tr>
          </tbody>
        </table>
      </div>
</div>
	</div>
</section><?	}
