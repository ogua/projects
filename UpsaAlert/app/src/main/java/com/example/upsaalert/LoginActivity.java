package com.example.upsaalert;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseApp;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class LoginActivity extends AppCompatActivity {
    private FirebaseAuth mAuth;
    private EditText uemail, upass;
    private Button lbtn;
    private ProgressBar progressBar;
    private TextView signupher;

    public static final String CHANNEL_ID = "UPSAALERT";
    private static final String CHANNEL_NAME = "UPSAALERT";
    private static final String CHANNEL_DESCRIPTION = "UPSA ALERT NOTIFICATION";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getSupportActionBar().setTitle("User Login");
        setContentView(R.layout.activity_login);
        mAuth = FirebaseAuth.getInstance();
        uemail = (EditText) findViewById(R.id.luemail);
        upass = (EditText) findViewById(R.id.lupass);
        lbtn = (Button) findViewById(R.id.loginbtn);
        progressBar = (ProgressBar) findViewById(R.id.progressBar);
        signupher = (TextView) findViewById(R.id.lsignup);
        progressBar.setVisibility(View.INVISIBLE);


        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.O){
            NotificationChannel channel = new NotificationChannel(CHANNEL_ID,CHANNEL_NAME, NotificationManager.IMPORTANCE_DEFAULT);
            channel.setDescription(CHANNEL_DESCRIPTION);
            NotificationManager manager = getSystemService(NotificationManager.class);
            manager.createNotificationChannel(channel);
        }

        //user Login
        lbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                progressBar.setVisibility(View.VISIBLE);
                String uemails = uemail.getText().toString().trim();
                String Upasswrd = upass.getText().toString().trim();


                if (uemails.isEmpty() || Upasswrd.isEmpty()){
                    if(uemails.isEmpty()){
                        uemail.setError("Email Cant Be Empty");
                        uemail.requestFocus();
                        progressBar.setVisibility(View.INVISIBLE);
                    }if(Upasswrd.isEmpty()){
                        upass.setError("Password Cant Be Empty");
                        upass.requestFocus();
                        progressBar.setVisibility(View.INVISIBLE);
                    }

                    return;
                }

                mAuth.signInWithEmailAndPassword(uemails,Upasswrd).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if(task.isSuccessful()){
                            progressBar.setVisibility(View.INVISIBLE);
                            Toast.makeText(LoginActivity.this, "Login Successfully", Toast.LENGTH_SHORT).show();
                            startActivity(new Intent(LoginActivity.this,MainActivity.class));
                            finish();
                        }
                    }
                });
            }
        });


        //Signup Page of You Dont Have An Account
        signupher.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(LoginActivity.this,RegisterActivity.class));
            }
        });
    }

    @Override
    protected void onStart() {
        super.onStart();
        if (mAuth.getCurrentUser() != null){
            finish();
            startActivity(new Intent(LoginActivity.this,MainActivity.class));
        }
    }
}
