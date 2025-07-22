<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class Form1
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
        Me.Label1 = New System.Windows.Forms.Label()
        Me.palabara = New System.Windows.Forms.TextBox()
        Me.Button1 = New System.Windows.Forms.Button()
        Me.siEsPalindromo = New System.Windows.Forms.Label()
        Me.noEsPalindromo = New System.Windows.Forms.Label()
        Me.SuspendLayout()
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Microsoft Sans Serif", 15.17!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(59, 118)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(101, 30)
        Me.Label1.TabIndex = 0
        Me.Label1.Text = "Palabra"
        '
        'palabara
        '
        Me.palabara.Font = New System.Drawing.Font("Microsoft Sans Serif", 10.8!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.palabara.Location = New System.Drawing.Point(166, 121)
        Me.palabara.Name = "palabara"
        Me.palabara.Size = New System.Drawing.Size(263, 28)
        Me.palabara.TabIndex = 1
        '
        'Button1
        '
        Me.Button1.Font = New System.Drawing.Font("Microsoft Sans Serif", 10.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Button1.Location = New System.Drawing.Point(183, 170)
        Me.Button1.Name = "Button1"
        Me.Button1.Size = New System.Drawing.Size(137, 31)
        Me.Button1.TabIndex = 3
        Me.Button1.Text = "Comprobar"
        Me.Button1.UseVisualStyleBackColor = True
        '
        'siEsPalindromo
        '
        Me.siEsPalindromo.AutoSize = True
        Me.siEsPalindromo.Font = New System.Drawing.Font("Microsoft Sans Serif", 20.8!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.siEsPalindromo.ForeColor = System.Drawing.Color.Green
        Me.siEsPalindromo.Location = New System.Drawing.Point(95, 36)
        Me.siEsPalindromo.Name = "siEsPalindromo"
        Me.siEsPalindromo.Size = New System.Drawing.Size(304, 39)
        Me.siEsPalindromo.TabIndex = 5
        Me.siEsPalindromo.Text = "ES PALINDROMO"
        Me.siEsPalindromo.Visible = False
        '
        'noEsPalindromo
        '
        Me.noEsPalindromo.AutoSize = True
        Me.noEsPalindromo.Font = New System.Drawing.Font("Microsoft Sans Serif", 20.8!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.noEsPalindromo.ForeColor = System.Drawing.Color.Red
        Me.noEsPalindromo.Location = New System.Drawing.Point(64, 36)
        Me.noEsPalindromo.Name = "noEsPalindromo"
        Me.noEsPalindromo.Size = New System.Drawing.Size(365, 39)
        Me.noEsPalindromo.TabIndex = 6
        Me.noEsPalindromo.Text = "NO ES PALINDROMO"
        Me.noEsPalindromo.Visible = False
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(8.0!, 16.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(504, 213)
        Me.Controls.Add(Me.noEsPalindromo)
        Me.Controls.Add(Me.siEsPalindromo)
        Me.Controls.Add(Me.Button1)
        Me.Controls.Add(Me.palabara)
        Me.Controls.Add(Me.Label1)
        Me.Name = "Form1"
        Me.Text = "Palindromo"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents Label1 As System.Windows.Forms.Label
    Friend WithEvents palabara As System.Windows.Forms.TextBox
    Friend WithEvents Button1 As System.Windows.Forms.Button
    Friend WithEvents siEsPalindromo As System.Windows.Forms.Label
    Friend WithEvents noEsPalindromo As System.Windows.Forms.Label

End Class
