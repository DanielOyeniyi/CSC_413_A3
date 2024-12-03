import serial
import time
import json

# Specify the Arduino's serial port and baud rate
SERIAL_PORT = '/dev/tty.usbmodem1401'  # Update this to your Arduino's port
BAUD_RATE = 9600

# File where the data will be saved
OUTPUT_FILE = 'CSC413_output.json'

# Predefined scenario data
SCENARIO_DATA = {
    1: {
        "truth": "Truth",
        "confidence": 92,
        "emotion": "Happy",
        "stress_level": "Low",
        "eye_dilation": "Normal",
        "question": "Where were you on the night of October 15th between 8 PM and 10 PM?",
        "answer": "At home watching a movie with my family.",
        "heart_rate": 75,
        "body_temperature": 98.6,
        "body_language": "Open"
    },
    2: {
        "truth": "Lie",
        "confidence": 65,
        "emotion": "Angry",
        "stress_level": "High",
        "eye_dilation": "Dilated",
        "question": "Why did you leave the party early?",
        "answer": "I don’t remember; I felt sick.",
        "heart_rate": 95,
        "body_temperature": 99.1,
        "body_language": "Defensive"
    },
    3: {
        "truth": "Truth",
        "confidence": 85,
        "emotion": "Calm",
        "stress_level": "Neutral",
        "eye_dilation": "Normal",
        "question": "What were you doing at the office last night?",
        "answer": "I was finishing up a project before the deadline.",
        "heart_rate": 70,
        "body_temperature": 98.4,
        "body_language": "Neutral"
    },
    4: {
        "truth": "Lie",
        "confidence": 40,
        "emotion": "Sad",
        "stress_level": "Low",
        "eye_dilation": "Constricted",
        "question": "Who was with you at the scene?",
        "answer": "I was alone; no one else was there.",
        "heart_rate": 65,
        "body_temperature": 97.9,
        "body_language": "Submissive"
    },
    5: {
        "truth": "Truth",
        "confidence": 75,
        "emotion": "Excited",
        "stress_level": "Moderate",
        "eye_dilation": "Dilated",
        "question": "What happened after the incident?",
        "answer": "I left and walked home; that’s all I remember.",
        "heart_rate": 85,
        "body_temperature": 99.0,
        "body_language": "Anxious"
    },
}

def main():
    try:
        # Open the serial connection
        arduino = serial.Serial(SERIAL_PORT, BAUD_RATE, timeout=1)
        print(f"Connected to Arduino on {SERIAL_PORT}")

        while True:
            # Read data from the Arduino
            if arduino.in_waiting > 0:
                raw_data = arduino.readline().decode('utf-8').strip()
                print(f"Received: {raw_data}")

                try:
                    # Parse the scenario number
                    #                     mock raw data from sensors and board
                    scenario_number = int(raw_data)


 # mocking going to the AI model trained to take the raw data and output the results
                    scenario_data = SCENARIO_DATA.get(scenario_number, {})

                    # Write data to the file in JSON format
                    with open(OUTPUT_FILE, 'w') as file:
                        json.dump(scenario_data, file, indent=4)

                except ValueError:
                    print(f"Invalid scenario received: {raw_data}")

                # Optional: Add a slight delay to avoid overwhelming the system
                time.sleep(1)

    except serial.SerialException as e:
        print(f"Error connecting to Arduino: {e}")
    except KeyboardInterrupt:
        print("Exiting program.")
    finally:
        # Ensure the serial connection is closed on exit
        if 'arduino' in locals() and arduino.is_open:
            arduino.close()
            print("Serial connection closed.")

if __name__ == "__main__":
    main()
