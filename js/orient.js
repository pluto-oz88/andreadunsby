const orientationEl = document.getElementById("orientation");

function checkOrientation() {
  const orientation =
    window.innerWidth > window.innerHeight ? "landscape" : "portrait";

  // Update PHP cookie with current orientation
  document.cookie = `device_orientation=${orientation}; path=/`;

  // Update display
  orientationEl.textContent = `PHP Orientation: ${orientation}`;
}

// Check orientation on load
checkOrientation();

// Update orientation when device is rotated
window.addEventListener("resize", checkOrientation);
