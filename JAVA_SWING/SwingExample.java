import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class SwingExample extends JFrame {
    private JButton button;
    private JLabel label;

    public SwingExample() {
        setTitle("Swing Example");
        setSize(300, 200);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        button = new JButton("Click Me");
        button.addActionListener(new ButtonListener());

        label = new JLabel("Welcome to Java Swing!");
        label.setHorizontalAlignment(SwingConstants.CENTER);

        add(button, BorderLayout.SOUTH);
        add(label, BorderLayout.CENTER);

        setVisible(true);
    }

    private class ButtonListener implements ActionListener {
        public void actionPerformed(ActionEvent e) {
            label.setText("Button clicked!");
        }
    }

    public static void main(String[] args) {
        SwingExample example = new SwingExample();
    }
}
