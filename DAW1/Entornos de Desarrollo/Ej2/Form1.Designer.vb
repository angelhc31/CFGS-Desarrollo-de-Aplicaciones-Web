<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class calcularPresupuesto
    Inherits System.Windows.Forms.Form

    'Form reemplaza a Dispose para limpiar la lista de componentes.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Requerido por el Diseñador de Windows Forms
    Private components As System.ComponentModel.IContainer

    'NOTA: el Diseñador de Windows Forms necesita el siguiente procedimiento
    'Se puede modificar usando el Diseñador de Windows Forms.  
    'No lo modifique con el editor de código.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.Azul = New System.Windows.Forms.RadioButton()
        Me.GroupBox1 = New System.Windows.Forms.GroupBox()
        Me.Rojo = New System.Windows.Forms.RadioButton()
        Me.Verde = New System.Windows.Forms.RadioButton()
        Me.Negro = New System.Windows.Forms.RadioButton()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.TextBox1 = New System.Windows.Forms.TextBox()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.ComboBox1 = New System.Windows.Forms.ComboBox()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.Button1 = New System.Windows.Forms.Button()
        Me.Nav = New System.Windows.Forms.CheckBox()
        Me.Contr = New System.Windows.Forms.CheckBox()
        Me.Sens = New System.Windows.Forms.CheckBox()
        Me.Sonido = New System.Windows.Forms.CheckBox()
        Me.Title = New System.Windows.Forms.Label()
        Me.Label5 = New System.Windows.Forms.Label()
        Me.Respuesta = New System.Windows.Forms.Label()
        Me.GroupBox1.SuspendLayout()
        Me.SuspendLayout()
        '
        'Azul
        '
        Me.Azul.AutoSize = True
        Me.Azul.Location = New System.Drawing.Point(212, 19)
        Me.Azul.Name = "Azul"
        Me.Azul.Size = New System.Drawing.Size(45, 17)
        Me.Azul.TabIndex = 0
        Me.Azul.TabStop = True
        Me.Azul.Text = "Azul"
        Me.Azul.UseVisualStyleBackColor = True
        '
        'GroupBox1
        '
        Me.GroupBox1.Controls.Add(Me.Rojo)
        Me.GroupBox1.Controls.Add(Me.Verde)
        Me.GroupBox1.Controls.Add(Me.Negro)
        Me.GroupBox1.Controls.Add(Me.Azul)
        Me.GroupBox1.Location = New System.Drawing.Point(214, 52)
        Me.GroupBox1.Name = "GroupBox1"
        Me.GroupBox1.Size = New System.Drawing.Size(263, 53)
        Me.GroupBox1.TabIndex = 1
        Me.GroupBox1.TabStop = False
        Me.GroupBox1.Text = "Color"
        '
        'Rojo
        '
        Me.Rojo.AutoSize = True
        Me.Rojo.Location = New System.Drawing.Point(40, 19)
        Me.Rojo.Name = "Rojo"
        Me.Rojo.Size = New System.Drawing.Size(47, 17)
        Me.Rojo.TabIndex = 3
        Me.Rojo.TabStop = True
        Me.Rojo.Text = "Rojo"
        Me.Rojo.UseVisualStyleBackColor = True
        '
        'Verde
        '
        Me.Verde.AutoSize = True
        Me.Verde.Location = New System.Drawing.Point(93, 19)
        Me.Verde.Name = "Verde"
        Me.Verde.Size = New System.Drawing.Size(53, 17)
        Me.Verde.TabIndex = 2
        Me.Verde.TabStop = True
        Me.Verde.Text = "Verde"
        Me.Verde.UseVisualStyleBackColor = True
        '
        'Negro
        '
        Me.Negro.AutoSize = True
        Me.Negro.Location = New System.Drawing.Point(152, 19)
        Me.Negro.Name = "Negro"
        Me.Negro.Size = New System.Drawing.Size(54, 17)
        Me.Negro.TabIndex = 1
        Me.Negro.TabStop = True
        Me.Negro.Text = "Negro"
        Me.Negro.UseVisualStyleBackColor = True
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Location = New System.Drawing.Point(21, 52)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(47, 13)
        Me.Label1.TabIndex = 2
        Me.Label1.Text = "Nombre:"
        '
        'TextBox1
        '
        Me.TextBox1.Location = New System.Drawing.Point(74, 52)
        Me.TextBox1.Name = "TextBox1"
        Me.TextBox1.Size = New System.Drawing.Size(119, 20)
        Me.TextBox1.TabIndex = 3
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Location = New System.Drawing.Point(21, 79)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(45, 13)
        Me.Label2.TabIndex = 4
        Me.Label2.Text = "Modelo:"
        '
        'ComboBox1
        '
        Me.ComboBox1.FormattingEnabled = True
        Me.ComboBox1.Items.AddRange(New Object() {"Picasso", "Scenic", "Toledo", "Fiesta", "Corsa"})
        Me.ComboBox1.Location = New System.Drawing.Point(72, 76)
        Me.ComboBox1.Name = "ComboBox1"
        Me.ComboBox1.Size = New System.Drawing.Size(121, 21)
        Me.ComboBox1.TabIndex = 5
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Location = New System.Drawing.Point(29, 137)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(39, 13)
        Me.Label3.TabIndex = 6
        Me.Label3.Text = "Extras:"
        '
        'Button1
        '
        Me.Button1.Location = New System.Drawing.Point(197, 188)
        Me.Button1.Name = "Button1"
        Me.Button1.Size = New System.Drawing.Size(75, 23)
        Me.Button1.TabIndex = 7
        Me.Button1.Text = "Calcular"
        Me.Button1.UseVisualStyleBackColor = True
        '
        'Nav
        '
        Me.Nav.AutoSize = True
        Me.Nav.Location = New System.Drawing.Point(74, 149)
        Me.Nav.Name = "Nav"
        Me.Nav.Size = New System.Drawing.Size(79, 17)
        Me.Nav.TabIndex = 8
        Me.Nav.Text = "Navegador"
        Me.Nav.UseVisualStyleBackColor = True
        '
        'Contr
        '
        Me.Contr.AutoSize = True
        Me.Contr.Location = New System.Drawing.Point(159, 149)
        Me.Contr.Name = "Contr"
        Me.Contr.Size = New System.Drawing.Size(113, 17)
        Me.Contr.TabIndex = 9
        Me.Contr.Text = "Control de crucero"
        Me.Contr.UseVisualStyleBackColor = True
        '
        'Sens
        '
        Me.Sens.AutoSize = True
        Me.Sens.Location = New System.Drawing.Point(278, 149)
        Me.Sens.Name = "Sens"
        Me.Sens.Size = New System.Drawing.Size(70, 17)
        Me.Sens.TabIndex = 10
        Me.Sens.Text = "Sensores"
        Me.Sens.UseVisualStyleBackColor = True
        '
        'Sonido
        '
        Me.Sonido.AutoSize = True
        Me.Sonido.Location = New System.Drawing.Point(354, 149)
        Me.Sonido.Name = "Sonido"
        Me.Sonido.Size = New System.Drawing.Size(83, 17)
        Me.Sonido.TabIndex = 11
        Me.Sonido.Text = "Sonido 24.7"
        Me.Sonido.UseVisualStyleBackColor = True
        '
        'Title
        '
        Me.Title.AutoSize = True
        Me.Title.BackColor = System.Drawing.SystemColors.Control
        Me.Title.Font = New System.Drawing.Font("Microsoft Sans Serif", 12.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Title.Location = New System.Drawing.Point(113, 9)
        Me.Title.Name = "Title"
        Me.Title.Size = New System.Drawing.Size(258, 20)
        Me.Title.TabIndex = 12
        Me.Title.Text = "CALCULO DE PRESUPUESTO"
        '
        'Label5
        '
        Me.Label5.AutoSize = True
        Me.Label5.Font = New System.Drawing.Font("Microsoft Sans Serif", 15.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label5.Location = New System.Drawing.Point(191, 296)
        Me.Label5.Name = "Label5"
        Me.Label5.Size = New System.Drawing.Size(0, 25)
        Me.Label5.TabIndex = 13
        '
        'Respuesta
        '
        Me.Respuesta.AutoSize = True
        Me.Respuesta.Font = New System.Drawing.Font("Microsoft Sans Serif", 13.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Respuesta.Location = New System.Drawing.Point(210, 214)
        Me.Respuesta.Name = "Respuesta"
        Me.Respuesta.Size = New System.Drawing.Size(0, 22)
        Me.Respuesta.TabIndex = 14
        '
        'calcularPresupuesto
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(489, 253)
        Me.Controls.Add(Me.Respuesta)
        Me.Controls.Add(Me.Label5)
        Me.Controls.Add(Me.Title)
        Me.Controls.Add(Me.Sonido)
        Me.Controls.Add(Me.Sens)
        Me.Controls.Add(Me.Contr)
        Me.Controls.Add(Me.Nav)
        Me.Controls.Add(Me.Button1)
        Me.Controls.Add(Me.Label3)
        Me.Controls.Add(Me.ComboBox1)
        Me.Controls.Add(Me.Label2)
        Me.Controls.Add(Me.TextBox1)
        Me.Controls.Add(Me.Label1)
        Me.Controls.Add(Me.GroupBox1)
        Me.Name = "calcularPresupuesto"
        Me.Text = "Calcular Presupuesto "
        Me.GroupBox1.ResumeLayout(False)
        Me.GroupBox1.PerformLayout()
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents Azul As System.Windows.Forms.RadioButton
    Friend WithEvents GroupBox1 As System.Windows.Forms.GroupBox
    Friend WithEvents Verde As System.Windows.Forms.RadioButton
    Friend WithEvents Negro As System.Windows.Forms.RadioButton
    Friend WithEvents Rojo As System.Windows.Forms.RadioButton
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents TextBox1 As System.Windows.Forms.TextBox
    Friend WithEvents Label2 As System.Windows.Forms.Label
    Friend WithEvents ComboBox1 As System.Windows.Forms.ComboBox
    Friend WithEvents Label3 As System.Windows.Forms.Label
    Friend WithEvents Button1 As System.Windows.Forms.Button
    Friend WithEvents Nav As System.Windows.Forms.CheckBox
    Friend WithEvents Contr As System.Windows.Forms.CheckBox
    Friend WithEvents Sens As System.Windows.Forms.CheckBox
    Friend WithEvents Sonido As System.Windows.Forms.CheckBox
    Friend WithEvents Title As System.Windows.Forms.Label
    Friend WithEvents Label5 As System.Windows.Forms.Label
    Friend WithEvents Respuesta As System.Windows.Forms.Label

End Class
