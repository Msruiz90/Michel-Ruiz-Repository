package com.mycompany.sistema_pedidos_medicamentos;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Sistema_pedidos_medicamentos extends JFrame {

    private JTextField medicamentoField;
    private JComboBox<String> tipoComboBox;
    private JTextField cantidadField;
    private JRadioButton cofarmaButton;
    private JRadioButton empsepharButton;
    private JRadioButton cemefarButton;
    private JCheckBox principalCheckBox;
    private JCheckBox secundariaCheckBox;
    private JButton borrarButton;
    private JButton confirmarButton;

    public Sistema_pedidos_medicamentos() {
        setTitle("Sistema de Pedidos de Medicamentos");
        setSize(400, 300);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);
        initComponents();
        setVisible(true);
    }

    private void initComponents() {
        // Panel principal
        JPanel panel = new JPanel(new GridLayout(8, 2));

        // Nombre del Medicamento
        panel.add(new JLabel("Nombre del Medicamento:"));
        medicamentoField = new JTextField();
        panel.add(medicamentoField);

        // Tipo del Medicamento
        panel.add(new JLabel("Tipo del Medicamento:"));
        String[] tipos = {"Analgesico", "Analeptico", "Anestesico", "Antiácido", "Antidepresivo", "Antibiótico"};
        tipoComboBox = new JComboBox<>(tipos);
        panel.add(tipoComboBox);

        // Cantidad del Producto
        panel.add(new JLabel("Cantidad:"));
        cantidadField = new JTextField();
        panel.add(cantidadField);

        // Distribuidor Farmacéutico
        panel.add(new JLabel("Distribuidor:"));
        JPanel distribuidorPanel = new JPanel();
        ButtonGroup distribuidorGroup = new ButtonGroup();
        cofarmaButton = new JRadioButton("Cofarma");
        empsepharButton = new JRadioButton("Empsephar");
        cemefarButton = new JRadioButton("Cemefar");
        distribuidorGroup.add(cofarmaButton);
        distribuidorGroup.add(empsepharButton);
        distribuidorGroup.add(cemefarButton);
        distribuidorPanel.add(cofarmaButton);
        distribuidorPanel.add(empsepharButton);
        distribuidorPanel.add(cemefarButton);
        panel.add(distribuidorPanel);

        // Sucursal de la Farmacia
        panel.add(new JLabel("Sucursal:"));
        JPanel sucursalPanel = new JPanel();
        principalCheckBox = new JCheckBox("Principal");
        secundariaCheckBox = new JCheckBox("Secundaria");
        sucursalPanel.add(principalCheckBox);
        sucursalPanel.add(secundariaCheckBox);
        panel.add(sucursalPanel);

        // Botones
        borrarButton = new JButton("Borrar");
        confirmarButton = new JButton("Confirmar");
        panel.add(borrarButton);
        panel.add(confirmarButton);

        add(panel);

        // Acción del botón Borrar
        borrarButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                limpiarFormulario();
            }
        });

        // Acción del botón Confirmar
        confirmarButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                confirmarPedido();
            }
        });
    }

    private void limpiarFormulario() {
        medicamentoField.setText("");
        tipoComboBox.setSelectedIndex(0);
        cantidadField.setText("");
        cofarmaButton.setSelected(false);
        empsepharButton.setSelected(false);
        cemefarButton.setSelected(false);
        principalCheckBox.setSelected(false);
        secundariaCheckBox.setSelected(false);
    }

    private void confirmarPedido() {
        String medicamento = medicamentoField.getText().trim();
        String tipo = (String) tipoComboBox.getSelectedItem();
        String cantidadStr = cantidadField.getText().trim();
        String distribuidor = null;
        if (cofarmaButton.isSelected()) distribuidor = "Cofarma";
        if (empsepharButton.isSelected()) distribuidor = "Empsephar";
        if (cemefarButton.isSelected()) distribuidor = "Cemefar";
        boolean principal = principalCheckBox.isSelected();
        boolean secundaria = secundariaCheckBox.isSelected();

        if (medicamento.isEmpty() || !medicamento.matches("[a-zA-Z0-9 ]+")) {
            JOptionPane.showMessageDialog(this, "Nombre de medicamento no válido.");
            return;
        }

        if (tipo == null || tipo.isEmpty()) {
            JOptionPane.showMessageDialog(this, "Seleccione un tipo de medicamento.");
            return;
        }

        int cantidad;
        try {
            cantidad = Integer.parseInt(cantidadStr);
            if (cantidad <= 0) throw new NumberFormatException();
        } catch (NumberFormatException ex) {
            JOptionPane.showMessageDialog(this, "Cantidad no válida.");
            return;
        }

        if (distribuidor == null) {
            JOptionPane.showMessageDialog(this, "Seleccione un distribuidor.");
            return;
        }

        if (!principal && !secundaria) {
            JOptionPane.showMessageDialog(this, "Seleccione al menos una sucursal.");
            return;
        }

        // Mostrar resumen del pedido
        String direccion = (principal ? "Calle de la Rosa n. 28" : "") + 
                           (principal && secundaria ? " y " : "") + 
                           (secundaria ? "Calle Alcazabilla n. 3" : "");

        JFrame resumenFrame = new JFrame("Pedido al distribuidor " + distribuidor);
        resumenFrame.setSize(300, 200);
        resumenFrame.setLocationRelativeTo(null);
        JPanel resumenPanel = new JPanel(new GridLayout(4, 1));
        resumenPanel.add(new JLabel(cantidad + " unidades del " + tipo + " " + medicamento));
        resumenPanel.add(new JLabel("Para la farmacia situada en " + direccion));
        JButton cancelarButton = new JButton("Cancelar");
        JButton enviarButton = new JButton("Enviar");
        resumenPanel.add(cancelarButton);
        resumenPanel.add(enviarButton);
        resumenFrame.add(resumenPanel);
        resumenFrame.setVisible(true);

        cancelarButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                resumenFrame.dispose();
            }
        });

        enviarButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                System.out.println("Pedido enviado");
                resumenFrame.dispose();
            }
        });
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            public void run() {
                new Sistema_pedidos_medicamentos();
            }
        });
    }
}