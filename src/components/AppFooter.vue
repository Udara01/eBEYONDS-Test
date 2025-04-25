<template>
  <footer class="footer">
    <div class="footer-container">
      <!-- Top Section -->
      <div class="footer-top">
        <div class="footer-info">
          <strong>IT Group</strong><br />
          C. Salvador de Madariaga, 1<br />
          28027 Madrid<br />
          Spain
        </div>
        <div class="footer-social">
          <p class="follow-us">Follow us on</p>
          <div class="social-icons">
            <a href="#" class="social-icon" aria-label="Twitter">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon" aria-label="YouTube">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>

      <hr />

      <!-- Bottom Section -->
      <div class="footer-bottom">
        <small>Copyright © 2025 Movie World. All rights reserved.</small>
        <small class="footer-credits">
          Photos by Felix Mooneeram &
          <a href="#" target="_blank" rel="noopener">Serge Kutuzov</a>
          on <a href="#" target="_blank" rel="noopener">Unsplash</a>
        </small>
      </div>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background-color: #1c1c1c;
  color: #fff;
  padding: 2rem 1rem;
  font-size: 0.95rem;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
}

.footer-top {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;

  @media (min-width: 768px) {
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
  }
}

.footer-info {
  flex: 1;
}

.footer-social {
  flex: 1;
  text-align: left;

  @media (min-width: 768px) {
    text-align: right;
  }
}

.follow-us {
  margin-bottom: 0.5rem;
}

.social-icons {
  display: flex;
  gap: 0.75rem;
  justify-content: flex-start;

  @media (min-width: 768px) {
    justify-content: flex-end;
  }
}

.social-icon {
  color: #fff;
  font-size: 1.5rem;
  transition: color 0.3s ease;
}

.social-icon:hover {
  color: #1da1f2;
}

a {
  color: #aaa;
  text-decoration: underline;
}

a:hover {
  color: #fff;
  text-decoration: none;
}

hr {
  border-color: #444;
  margin: 1.5rem 0;
}

.footer-bottom {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;

  @media (min-width: 768px) {
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }
}

.footer-credits {
  text-align: left;

  @media (min-width: 768px) {
    text-align: right;
  }
}
</style>
