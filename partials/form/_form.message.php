<form action="" method="post">
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea
                class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                id="message" name="message"
                rows="3"
                placeholder="Saisissez votre message"
        ></textarea>
        <div class="invalid-feedback">
            <?= $errors['message'] ?? '' ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>