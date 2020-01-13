<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?>
<h1> IP verification - JSON </h1>

<p>Enter an IP address to verify it.</p>

<p>You can enter an IP below or send a GET request to [baseurl]/json/verify?ip=x.x.x.x </p>


<form action="json/verify">

    <p>
        <label>IP:<br>
        <input type="text" name="ip"/>
        </label>
    </p>

    <p>
        <input type="submit" value="Verify">
    </p>
</form>

<p>Example:
    <a href="json/verify?ip=8.8.8.8">Test</a>
    <a href="json/verify?ip=2001:4860:4860::8888">Test 2</a>
</p>
