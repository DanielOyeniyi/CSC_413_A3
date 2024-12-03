#include <LiquidCrystal.h>

LiquidCrystal lcd_1(2, 3, 4, 5, 6, 7);

// Button pin definitions
const int button_left_pin = 8;
const int button_right_pin = 9;

// Variables to store button states and scenario
int button_left_state = 0;
int button_right_state = 0;
int current_scenario = 1; // Start with scenario 1
const int max_scenarios = 5;

void setup()
{
  // Set up LCD
  lcd_1.begin(16, 2); // Set up the number of columns and rows on the LCD.

  // Configure button pins as inputs with pull-up resistors
  pinMode(button_left_pin, INPUT_PULLUP);
  pinMode(button_right_pin, INPUT_PULLUP);

  // Start Serial communication
  Serial.begin(9600);

  // Display the initial scenario
  updateLCD();
}

void loop()
{
  // Read button states
  button_left_state = digitalRead(button_left_pin);
  button_right_state = digitalRead(button_right_pin);

  // Check if the left button is pressed
  if (button_left_state == LOW)
  {
    current_scenario--;
    if (current_scenario < 1)
    {
      current_scenario = max_scenarios; // Wrap around to the last scenario
    }
    updateLCD();
    delay(300); // Debounce delay
  }

  // Check if the right button is pressed
  if (button_right_state == LOW)
  {
    current_scenario++;
    if (current_scenario > max_scenarios)
    {
      current_scenario = 1; // Wrap around to the first scenario
    }
    updateLCD();
    delay(300); // Debounce delay
  }
}

void updateLCD()
{
  lcd_1.clear();
  lcd_1.print("Selected:");
  lcd_1.setCursor(0, 1);
  lcd_1.print("Scenario: ");
  lcd_1.print(current_scenario);

  // Send the current scenario to Serial
  Serial.println(current_scenario);
}
