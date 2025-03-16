import keyboard
import time

print("Press ESC to stop...")

while True:
    keyboard.press_and_release('enter')  # Simulate pressing Enter
    time.sleep(1)  # Adjust this value to change the speed
    if keyboard.is_pressed("esc"):  # Stop when ESC is pressed
        print("Stopping script...")
        break
