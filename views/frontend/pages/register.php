<div class="col-md-9">
    <h3 class="heading">Dang ki</h3>
    <form action="<?= URL ?>index.php/frontend/doRegister" method="post">
        <div class="registration">
            <label for="name"><b>Ho ten</b></label>
            <input type="text" placeholder="Ho ten" name="name" required>

            <label for="address"><b>Dia chi</b></label>
            <input type="text" placeholder="Dia chi" name="address" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <label for="phone"><b>Phone</b></label>
            <input type="number" placeholder="Enter Phone" name="phone" required>

            <label for="pass"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" id="pass" required>
            <label for=""><b>
            </b></label>
            <br>
            <label for="pass-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="pass-repeat" id="pass-repeat" required>

            <button type="submit" class="registerbtn" name="submit">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a> </p>
        </div>
    </form>
</div>