package com.example.administrator.proje;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

import com.example.erdogan.kullanici_hesabi.R;

public class SplashScreen extends Activity
{
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.splash);
        Thread mSplashThread;
        mSplashThread = new Thread(){
            @Override
            public void run(){
                try {

                    synchronized(this){
                        wait(3000);
                    }
                }catch(InterruptedException ex){

                }
                finally{

                    Intent i=new Intent(getApplicationContext(),MainActivity.class);
                    startActivity(i);
                    finish();
                }

            }
        };
        mSplashThread.start();

    }
}

